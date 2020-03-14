<?php


namespace App\Models;


use App\Traits\InteractsWithClassConstants;

class AdminRole
{
    use InteractsWithClassConstants;

    const ADMIN         = 1;
    const SUPER_ADMIN   = 2;
}
