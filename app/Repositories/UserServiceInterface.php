<?php


namespace App\Repositories;


interface UserServiceInterface
{
    /**
     * Creates a new user
     * @param array $data The new user's primary details
    */
    public function createUser($data);
}
