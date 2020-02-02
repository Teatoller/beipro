<?php

namespace Tests\Feature;

use App\Helpers\ResponseMessages;
use Tests\TestCase;

class UserLoginTest extends TestCase
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
     * Test the creation of a user without providing a email
     */
    public function testWithoutProvidingEmail()
    {
        $this->tryUnsetPostBody('email');
    }

    /**
     * Test the creation of a user without providing a password
     */
    public function testWithoutProvidingPassword()
    {
        $this->tryUnsetPostBody('password');
    }

    /**
     * Test the creation of a user using an invalid password
     */
    public function testWithoutProvidingValidPassword()
    {
        $this->postData['password'] = 'testpassword';
        $this->getResponse($this->postData)
            ->assertStatus(422)
            ->assertJson([
                'message' => [
                    'password' => [
                        ResponseMessages::getResponseMessage(422, ['field' => 'password']),
                    ],
                ],
            ]);
    }

    /**
     * Test the creation of a user using incomplete data
     */
    public function testWithoutProvidingValidEmail()
    {
        $this->postData['email'] = 'johndoe@email';
        $this->getResponse($this->postData)
            ->assertStatus(422)
            ->assertJson([
                'message' => [
                    'email' => [
                        ResponseMessages::getResponseMessage(422, ['field' => 'email']),
                    ],
                ],
            ]);
    }

    /**
     * Test the creation of a user using valid data
     */
    public function testUsingValidData()
    {
        $this->getResponse($this->postData)
            ->assertStatus(200)
            ->assertJson([
                'message' => ResponseMessages::getResponseMessage(
                    200,
                    ['action' => 'login', 'user' => $this->testData['testuser']->fullname]
                ),
                'user' => [
                    'email' => $this->postData['email'],
                ],
            ]);
    }

    /**
     * Makes the call to the create User API endpoint
     * @param array $data The post data
     * @return Response
     */
    protected function getResponse($data)
    {
        return $this->post('/api/login', $data);
    }

    /**
     * Test the creation of a user using incomplete data
     */
    protected function tryUnsetPostBody($key)
    {
        unset($this->postData[$key]);
        $this->getResponse($this->postData)
            ->assertStatus(422)
            ->assertJson([
                'message' => [
                    $key => [
                        'The ' . $key . ' field is required.',
                    ],
                ],
            ]);
    }
}
