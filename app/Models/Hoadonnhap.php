<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hoadonnhap extends Model
{
    protected $table = 'hoadonnhap';

    
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'hdn_ma',
        'hdn_soluong',
      ];
}
