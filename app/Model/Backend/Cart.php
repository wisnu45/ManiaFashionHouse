<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable =[
        'totall',
        'quantity',
    ];
    public function productItem()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
