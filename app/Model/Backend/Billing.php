<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    public function Product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
