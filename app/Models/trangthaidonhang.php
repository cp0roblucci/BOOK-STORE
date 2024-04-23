<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class trangthaidonhang extends Model
{
    protected $table = 'trangthai_donhang';
    protected $primaryKey = 'TT_Ma';
    public $timestamps = false;
    protected $fillable = [
        'TT_Ma',
        'TT_Ten',
        'TT_GhiChu'
      ];
    use HasFactory;
}
