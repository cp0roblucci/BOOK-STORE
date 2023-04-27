<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishSpecies extends Model
{
    protected $table = 'fish_species';
    public $timestamps = false;
    protected $fillable = [
      'fish_species'
    ];

    use HasFactory;
}
