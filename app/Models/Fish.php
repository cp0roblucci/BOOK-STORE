<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Fish extends Model
{
    protected $table = 'fish';

    use HasFactory;

    protected $fillable = [
      'fish_id',
      'fish_link_img',
      'fish_species',
      'fish_name',
      'ph_level',
      'color',
      'fish_size',
      'fish_habit',
      'fish_desc'
    ];
    
    public $timestamps = false;

  public function orderDetails(): MorphMany
  {
    return $this->morphMany(OrderDetail::class, 'product');
  }
}
