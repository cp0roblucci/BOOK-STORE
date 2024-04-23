<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tacgia extends Model
{
    protected $table = 'tacgia';
    protected $primaryKey = 'TG_Ma';
    protected $fillable = [
    'TG_Ma',
    'TG_Ten',

    ];
    public $timestamps = false;
    use HasFactory;
}
