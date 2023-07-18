<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $fillable = [
        'question_about',
        'question',
        'answer',
        'status',
       
        
     
    ];
}
