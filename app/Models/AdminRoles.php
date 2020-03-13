<?php


namespace App\Models;


use App\Traits\InteractsWithClassConstants;

class AdminRoles
{
    use InteractsWithClassConstants;

    const ADMIN         = 1;
    const SUPER_ADMIN   = 2;
}
