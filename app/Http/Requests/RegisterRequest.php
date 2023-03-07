<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' =>  'required|string|min:7|max:100',
            'email' =>  'required|string|email:rfc,dns',
            'password' => [
                'required',
                'string',
                'min:10',             // must be at least 10 characters in length
                'max:30',
                'regex:/[a-z]/',      // must contain at least one lowercase letter
                'regex:/[A-Z]/',      // must contain at least one uppercase letter
                'regex:/[0-9]/',      // must contain at least one digit
                'regex:/[@$!%*#?&]/', // must contain a special character
            ],
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Make sure you have an email',
            'password.max' => 'Password cannot be more than 30 characters.',
            'password.min' => 'Password cannot be less than 10 characters.',
            'password.string' => 'Password should be a string.',
        ];
    }
}
