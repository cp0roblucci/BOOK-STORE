<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhacungcap extends Model
{
    protected $table = 'nhacungcap';

    use HasFactory;

    protected $fillable = [
        'NCC_Ma',
        'NCC_Ten',
        'NCC_Diachi',
        'NCC_Email',
        'NCC_SDT'
      ];
    public $timestamps = false;
}
