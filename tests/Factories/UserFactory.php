<?php

namespace Tests\Factories;

use App\Models\User;

class UserFactory
{
    public function create()
    {
        return factory(User::class)->create();
    }
}
