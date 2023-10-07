<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    protected $table = 'nhacungcap';

    use HasFactory;

    protected $fillable = [
        'ncc_ma',
        'ncc_ten'
      ];
}
