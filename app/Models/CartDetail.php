<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CartDetail extends Model
{
    protected $table = 'cart_details';
    use HasFactory;

    protected $fillable = [
        'cart_id' ,
        'product_id',
        'category_id',
        'quantity' 
    ];
}
