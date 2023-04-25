<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishImport extends Model
{
  use HasFactory;

  protected $table = 'fish_import_batches';
  public $timestamps = false;
  protected $fillable = [
    'fish_id',
    'quantity',
  ];
}
