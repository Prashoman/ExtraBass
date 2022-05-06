<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    function relationToproduct(){
        return $this->hasOne(Product::class, 'id' , 'product_id');
    }
    function relationTouser(){
        return $this->hasOne(User::class, 'id' , 'user_id');
    }
}
