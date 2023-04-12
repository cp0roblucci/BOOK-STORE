<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Fish extends Model
{
    protected $table = 'fish';

    use HasFactory;

  public function orderDetails(): MorphMany
  {
    return $this->morphMany(OrderDetail::class, 'product');
  }
}
