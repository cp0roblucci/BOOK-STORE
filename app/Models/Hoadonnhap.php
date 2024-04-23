<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
class Hoadonnhap extends Model
{
    protected $table = 'hoadonnhap';

    protected $primaryKey = 'HDN_Ma';
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'HDN_Ma',
        'ND_Ma',
        'HDN_NgayNhap',
        'HDN_Ghichu',
      ];

      public function cthdn(): MorphTo
      {
        return $this->morphTo();
      }
  
      public function chitiethoadonnhap()
      {
      return $this->hasMany(ChiTietHoaDonNhap::class, 'HDN_Ma');
      } 
}
