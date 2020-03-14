<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'user_type',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return string|null
     */
    public function getType()
    {
        return UserType::get($this->user_type);
    }

    /**
     * @return boolean
     */
    public function isVendor()
    {
        return $this->user_type === UserType::VENDOR;
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'vendor_id', 'id');
    }
}
