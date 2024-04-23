<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Chitietdonhang extends Model
{
    protected $table = 'chitietdonhang';
    protected $primaryKey = 'CTDH_Ma';
    public $timestamps = false;
    protected $fillable = [
        'CTDH_Ma',
        'S_Ma',
        'DH_Ma',
        'CTDH_SoLuong',
        'CTDH_DonGia'
      ];
    use HasFactory;

    public function product(): MorphTo
    {
      return $this->morphTo();
    }
}
