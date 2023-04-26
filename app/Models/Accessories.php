<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Accessories extends Model
{
    protected $table = 'accessories';
    use HasFactory;
    public $timestamps = false;

    protected $fillable = [
      'accessories_id',
      'accessories_type_id',
      'accessories_name' ,
      'accessories_price',
      'accessories_desc',
      'accessories_link_img',
    ];

  public function orderDetails(): MorphMany
  {
    return $this->morphMany(OrderDetail::class, 'product');
  }
}
