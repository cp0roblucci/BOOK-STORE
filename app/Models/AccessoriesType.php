<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoriesType extends Model
{
    protected $table = 'accessories_type';
    public $timestamps = false;
    protected $fillable = [
      'accessories_type_id',
      'accessories_type_name',
    ];
    use HasFactory;
}
