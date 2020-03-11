<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'email' => ['required', 'email'],
            'password' => ['required', 'min:4']
        ];
    }

    /**
     * Returns validation error messages to to frontend
     *
     * @return array
     */
    public function messages()
    {
        return [
            'email.required' => 'Email address is required',
            'email.email' => 'Email address must be a valid email',
            'password.required' => 'Password is required',
            'password.min' => 'Password cannot be less than four characters'
        ];
    }
}
