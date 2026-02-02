<?php

namespace App\Models;
use App\Models\productDetails;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    //
   
   public function product_details()
{
    return $this->hasMany(ProductDetails::class, 'productId');
}

}
