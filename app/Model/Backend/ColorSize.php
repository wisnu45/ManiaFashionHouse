<?php

namespace App\Model\Backend;

use Illuminate\Database\Eloquent\Model;

class ColorSize extends Model
{
    protected $fillable = ['product_id','color','size','quantity'];
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id');
    }
}
