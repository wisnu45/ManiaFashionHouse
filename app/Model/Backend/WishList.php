<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class WishList extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
