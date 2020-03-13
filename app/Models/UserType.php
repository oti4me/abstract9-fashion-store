<?php


namespace App\Models;


use App\Traits\InteractsWithClassConstants;

class UserType
{
    use InteractsWithClassConstants;

    const CUSTOMER  = 1;
    const VENDOR    = 2;
}
