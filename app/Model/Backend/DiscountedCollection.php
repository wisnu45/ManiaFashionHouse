<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class DiscountedCollection extends Model
{
    Protected $casts=[
		'product_id' =>'array'
    ] ;
    protected $fillable = [
        'collection_name',
        'collection_img',
        'catagory_id',
        'product_id',
        'discount_title',
        'discount',
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
    public function Catagory()
    {
        return $this->belongsTo(Catagory::class,'catagory_id');
    }
}
