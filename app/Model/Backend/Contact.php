<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'phone',
        'street',
        'distric',
        'address',
        'days',
        'hours',
     
     
    ];
}
