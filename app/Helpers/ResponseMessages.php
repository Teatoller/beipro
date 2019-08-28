<?php

namespace App\Helpers;

class ResponseMessages
{

    protected static function getValidationErrorMessage($field){
        switch($field){
            case 'password': return 'Password is incorrect. Please provide a password that contains at least 1 lowercase '
                . 'letter, 1 uppercase letter, 1 digit and 1 special character from this set (.!@#$%^&*). The password '
                . 'length should be 8-16 characters long!';
            case 'email': return 'Email is invalid. Please provide a valid email address!';
            default : return "";
        }
    }

    /**
     * Retrieves the expected response messages
     * @param string/number $responseCode The response code
     * @param array $data The data used to generate a message according to scenario
     * @return string Response message
     */
    public static function getResponseMessage($responseCode, $data)
    {
        switch ($responseCode) {
            case 201: return strtr('You have successfully created $resource!', [
                    '$resource' => $data['resource'],
                ]);
            case 422: return static::getValidationErrorMessage($data['field']);
            default: return '';
        }
    }
}
