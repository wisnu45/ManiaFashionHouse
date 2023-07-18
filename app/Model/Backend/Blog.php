<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'features_img',
        'author_name',
        'tag',
        'title',
        'description',
        'meta_title',
        'slug',
        'meta_description',


    ];
}
