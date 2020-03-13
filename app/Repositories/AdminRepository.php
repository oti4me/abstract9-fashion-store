<?php


namespace App\Repositories;


use App\Models\Admin;

class AdminRepository
{
    /**
     * Create a new admin instance.
     *
     * @param string $email
     * @return Admin
     */
    public static function getByEmail($email)
    {
        return Admin::whereEmail($email)->first();
    }
}
