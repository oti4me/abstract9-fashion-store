<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository
{
    /**
     * Get an existing user by email
     *
     * @param $email
     *
     * @return User
     */
    public static function getUserByEmail($email)
    {
        return User::whereEmail($email)->first();
    }

    /**
     * Create a new user instance.
     *
     * @param  array  $data
     * @return User
     */
    public static function createUser(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

}
