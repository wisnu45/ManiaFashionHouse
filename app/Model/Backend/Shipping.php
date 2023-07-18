<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    public function division_model()
    {

        return $this->belongsTo(Division::class,'division');
    }
    public function district_model()
    {

        return $this->belongsTo(District::class,'district');
    }
    public function upazila_model()
    {

        return $this->belongsTo(Upazila::class,'upazila');
    }
    public function union_model()
    {
        return $this->belongsTo(Union::class,'union');
    }
    // public function order()
    // {
    //     return $this->belongsToMany(Order::class,'billing_id');
    // }
}
