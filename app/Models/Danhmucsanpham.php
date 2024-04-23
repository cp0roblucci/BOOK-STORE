<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmucsanpham extends Model
{
    protected $table = 'danhmucsanpham';
    protected $primaryKey = 'DM_Ma';
    protected $fillable = [
        'DM_Ten',
        'DM_PhanCap'
    ];
    public $timestamps = false;
    use HasFactory;
}
