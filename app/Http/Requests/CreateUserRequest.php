<?php

namespace App\Http\Requests;

use App\Helpers\RegexHelper;
use App\Helpers\ResponseMessages;
use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'regex:' . RegexHelper::EMAIL_REGEX, 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'regex:' . RegexHelper::PASSWORD_REGEX],
        ];
    }

    public function messages()
    {
        return [
            'password.regex' => ResponseMessages::getResponseMessage(422, ['field' => 'password']),
            'email.regex' => ResponseMessages::getResponseMessage(422, ['field' => 'email']),
        ];
    }
}
