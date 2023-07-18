<?php

namespace App\Model\Backent;

use App\Model\Backend\District;
use App\Model\Backend\Division;
use Illuminate\Database\Eloquent\Model;

class custom_order extends Model
{
    public function divisionName()
    {
        return $this->belongsTo(Division::class,'division');
    }
    public function districtName()
    {
        return $this->belongsTo(District::class,'district');
    }
}
