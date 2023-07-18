<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Subcatagory extends Model
{
    protected $fillable = ['catagory_id','subcatagory'];

    public function catagory()
    {
        return $this->belongsTo(Catagory::class,'catagory_id');
    }
}
