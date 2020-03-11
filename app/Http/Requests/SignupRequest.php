<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:5'],
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
            'first_name.required' => 'First Name is required',
            'last_name.required' => 'Last Name is required',
            'email.email' => 'Email address must be a valid email',
            'email.required' => 'Email address is required',
            'password.required' => 'Password is required',
            'password.min' => 'Password cannot be less than five characters'
        ];
    }
}
