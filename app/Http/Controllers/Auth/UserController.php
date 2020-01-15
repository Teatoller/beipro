<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\CreateUserRequest;
use App\Helpers\ResponseMessages;
use App\Http\Controllers\Controller;
use App\Repositories\UserServiceInterface;


class UserController extends Controller
{
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
