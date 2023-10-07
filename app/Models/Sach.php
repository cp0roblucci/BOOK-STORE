<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;
class Sach extends Model
{
    protected $table ='sach';
    use HasFactory;

    protected $fillable = [
        'S_ma',
        'S_ten',
        'S_giaban',
        'S_mota',
        'S_ngayxuatban',
        'S_DichGia',
        'S_Sotrang',
        'S_trongluong',
        'S_hinhanh',
      ];
      
      public $timestamps = false;

    public function chitietDonHang(): MorphMany
  {
    return $this->morphMany(Chitietdonhang::class, 'product');
  }
    
}
