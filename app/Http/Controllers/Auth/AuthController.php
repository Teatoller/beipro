<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\RegisterActivate;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use JD\Cloudder\Facades\Cloudder;

class AuthController extends Controller
{
    /**
     * Register a new user.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:55',
            'lastname' => 'required|string|max:55',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|confirmed',
        ]);
        $user = new User([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'activation_token' => str::random(60),
        ]);
        $user->save();

        $user->notify(new RegisterActivate($user));

        return response()->json([
            'message' => 'An email with the confirmation link is sent to your email to complete your activation process.',
        ], 201);
    }

    /**
     * Signup activate a new user account.
     *@param  int  $token
     * @return \Illuminate\Http\Response
     */

    public function registerActivate($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            return response()->json([
                'message' => 'This activation token is invalid.',
            ], 404);
        }
        $user->active = true;
        $user->activation_token = '';
        $user->save();

        return redirect()->away('http://www.beipro.net/login');
    }

    /**
     * Login a registered user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean',
        ]);
        $loginData = request(['email', 'password']);
        $loginData['active'] = 1;
        $loginData['deleted_at'] = null;
        if (!Auth::attempt($loginData)) {
            return response()->json([
                'message' => "Unauthorized. First time login? Activate account from  your inbox before continuing. Else check that the email and password are correct",
            ], 401);
        }

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();
        return response()->json([
            'email' => $user->email,
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString(),
            'message' => 'You have logged in succesfully',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request)
    {
        return response()->json($request->user());
    }

    /**
     * Update profile name the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_name(Request $request)
    {
        $request->validate([
            'firstname' => 'required|string|max:55',
            'lastname' => 'required|string|max:55',
        ]);

        $user = $request->user();

        if ($user) {
            $firstname = $request->firstname;
            $lastname = $request->lastname;

            $user->firstname = is_null($firstname) ? $user->firstname : $firstname;
            $user->lastname = is_null($lastname) ? $user->lastname : $lastname;

            $user->save();

            return response()->json([
                "message" => "records updated successfully",
            ], 200);
        } else {
            return response()->json([
                "message" => "user not found",
            ], 404);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update_avatar(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user = $request->user();

        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');

            $name = $request->file('avatar')->getClientOriginalName();

            $avatar = $request->file('avatar')->getRealPath();

            Cloudder::upload($avatar, null);

            list($width, $height) = getimagesize($avatar);

            $avatar_url = Cloudder::show(Cloudder::getPublicId(), ["width" => $width, "height" => $height]);

        } else {
            $avatar_url = 'noavatar.jpg';
        }

        //save images url
        $user->avatar_url = $avatar_url;
        $user->save();

        //save to uploads directory
        $image->move(public_path("avatars"), $name);

        return response()->json([
            'message' => "'Success','You have successfully upload avatar.",
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function refresh(Request $request, $id)
    {
        //
    }

    /**
     * Revoke the specified access token from storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        $accessToken = $request->user()->token();
        $accessToken->revoke();

        return response()->json([
            'message' => 'You have been succesfully logged out',
        ]);
    }
}
