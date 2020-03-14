<?php


namespace App\Models;


use App\Traits\InteractsWithClassConstants;

class ProductStatus
{
    use InteractsWithClassConstants;

    const SUBMITTED  = 1;
    const APPROVE    = 2;
    const DENIED     = 3;
}
