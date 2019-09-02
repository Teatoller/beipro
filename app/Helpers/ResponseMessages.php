<?php

namespace App\Helpers;

class ResponseMessages
{
    const VALIDATION_ERROR_MESSAGES = [
        'password' => 'Password is incorrect. Please provide a password that contains at least 1 lowercase '
            . 'letter, 1 uppercase letter, 1 digit and 1 special character from this set (.!@#$%^&*). The password '
            . 'length should be 8-16 characters long!',
        'email' => 'Email is invalid. Please provide a valid email address!',
    ];

    /**
     * Retrieves the expected response messages
     * @param number $responseCode The response code
     * @param array $data The data used to generate a message according to scenario
     * @return string Response message
     */
    public static function getResponseMessage($responseCode, array $data = [])
    {
        switch ($responseCode) {
            case 200:
                return static::getSuccessMessage($data);
            case 201:
                return strtr('You have successfully created $resource!', [
                    '$resource' => $data['resource'],
                ]);
            case 401:
                return 'Authentication has failed. Please provide your correct credentials!';
            case 422:
                return static::VALIDATION_ERROR_MESSAGES[$data['field']];
            default:
                return '';
        }
    }

    /**
     * Retrieves the expected success messages
     * @param array $data The data used to generate a message according to action
     * @return string Response message
     */
    protected static function getSuccessMessage($data)
    {
        switch ($data['action']) {
            case 'login':
                return strtr('You hav successfully logged in as $user!', ['$user' => $data['user']]);
            case 'logout':
                return 'You have successfully logged out!';
            case 'tokenRefresh':
                return 'You have successfully refreshed your token!';
            default:
                return '';
        }
    }
}
