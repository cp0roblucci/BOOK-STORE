<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Donhang extends Model
{
    protected $table = 'donhang';
    protected $primaryKey = 'DH_Ma';
    public $timestamps = false;
    protected $fillable = [
        'DH_Ma',
        'TT_Ma',
        'ND_Ma',
        'DH_NgayTao',
        'DH_DiaChiGiao',
        'DH_SDTNhan',
        'DH_TenNguoiNhan',
        'DN_GhiChu',
      ];
    use HasFactory;
}
