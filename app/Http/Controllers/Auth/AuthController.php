<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserLoginRequest;
use Illuminate\Support\Facades\Cookie;


class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Authentication Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function login(UserLoginRequest $request){
        $token = auth()->attempt($request->validated());

        if(!$token) {
            return response([
                'message' => ResponseMessages::getResponseMessage(401)
            ], 401);
        }

        return response([
            'message' => ResponseMessages::getResponseMessage(
                200,
                [ 'action' => 'login', 'user' => auth()->user()->fullname]
            ),
            'user' => auth()->user(),
            'access_token' => $token
        ])->cookie('access_token', $token, auth()->factory()->getTTL() * 60, '/', url('/'), true);
    }


    public function refreshToken(){
        return response([
            'message' => ResponseMessages::getResponseMessage(
                200,
                [ 'action' => 'tokenRefresh']
            )
        ], 200)->cookie(
            'access_token',
            auth()->refresh(),
            auth()->factory()->getTTL() * 60,
            '/',
            url('/'),
            true
        );
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();
        Cookie::forget('access_token');
        return response()->json([
            'message' => ResponseMessages::getResponseMessage(200, ['action' => 'logout'])
        ]);
    }
}
