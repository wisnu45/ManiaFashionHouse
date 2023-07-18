<?php

namespace App\Model\Backend;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function billing()
    {
        return $this->belongsTo(Checkout::class,'billing_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function user()
    {

        return $this->belongsTo(User::class,'user_id');
    }

}
