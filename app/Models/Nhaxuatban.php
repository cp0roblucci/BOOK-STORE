<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhaxuatban extends Model
{
    protected $table = 'nhaxuatban';
    protected $fillable = [
        'NXB_Ma',
        'NXB_Ten',
        'NXB_DiaChi'
    ];
    public $timestamps = false;
    use HasFactory;
}
