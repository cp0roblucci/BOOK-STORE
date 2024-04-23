<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
class Sach extends Model
{
    protected $table ='sach';
    protected $primaryKey = 'S_Ma';
    use HasFactory;
    // use SoftDeletes;
    protected $fillable = [
        'S_Ma',
        'NXB_Ma',
        'NCC_Ma',
        'TG_Ma',
        'DM_Ma',
        'S_Ten',
        'S_GiaBan',
        'S_Mota',
        'S_SoLuong',
        'S_NamXuatBan',
        'S_DichGia',
        'S_SoTrang',
        'S_TrongLuong',
        'S_HinhAnh',
      ];
      
      public $timestamps = false;

    public function chitietDonHang(): MorphMany
  {
    return $this->morphMany(Chitietdonhang::class, 'product');
  }
  
  public function importcthd(): MorphMany
  {
  return $this->morphMany(Chitiethoadonnhap::class, 'importcthdn');
  }
}
