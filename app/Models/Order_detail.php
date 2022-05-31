<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;
    function relationorder_detailswithuser(){
        return $this->belongsTo(User::class , 'vendor_id', 'id');
    }
    function relationwithproduct(){
        return $this->belongsTo(Product::class , 'product_id', 'id');
    }
}
