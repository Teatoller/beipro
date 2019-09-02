<?php

namespace Tests\Feature;

use App\Helpers\ResponseMessages;
use Tests\TestCase;

class UserLogoutTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->postData = [
            'email' => $this->testData['testuser']->email,
            'password' => 'Testpa$$word1',
        ];
    }

    /**
     * Test the creation of a user using valid data
     */
    public function testUsingValidAccessToken()
    {
        $this->login();

        $this->get('api/auth/test')->assertStatus(200);

        $this->logout()
            ->assertStatus(200)
            ->assertJson([
                'message' => ResponseMessages::getResponseMessage(200, ['action' => 'logout']),
            ]);

        $this->get('api/auth/test')->assertStatus(401);
    }

    /**
     * Makes the call to the create User API endpoint
     * @param array $data The post data
     * @return Response
     */
    protected function login()
    {
        return $this->post('/api/auth/login', $this->postData)->json();
    }

    /**
     * Makes the call to the logout User API endpoint
     * @param array $data The post data
     * @return Response
     */
    protected function logout()
    {
        return $this->get('/api/auth/logout');
    }
}
