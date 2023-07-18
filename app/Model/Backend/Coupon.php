<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $fillable = [
        'coupon_title',
        'coupon_code',
        'discount',
        'start_date',
        'end_date',
        'status',

    ];
}
