<?php

namespace Tests\Fixtures;

use Facades\Tests\Factories\UserFactory;

class UsersFixture
{
    public function execute()
    {
        $user = UserFactory::create();

        return [
            'testuser' => $user,
        ];
    }
}
