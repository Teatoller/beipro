<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\CreateUserRequest;
use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Repositories\UserServiceInterface;


class UserController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function store(CreateUserRequest $request){
        return response([
            'user' => $this->userService->createUser($request->validated()),
            'message' => ResponseMessages::getResponseMessage(201, [ 'resource' => 'a user' ])
        ], 201);
    }
}
