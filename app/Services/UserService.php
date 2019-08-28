<?php


namespace App\Services;


use App\Models\User;
use App\Repositories\UserServiceInterface;
use Illuminate\Support\Facades\Hash;

class UserService implements UserServiceInterface
{
    /**
     * Creates a new user
     * @param array $data The new user's primary details
     * @return App\Models\User A new user instance
     */
    public function createUser($data)
    {
        $data['password'] =  Hash::make($data['password']);
        return User::create($data);
    }
}
