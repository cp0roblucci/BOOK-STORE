<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessoriesImport extends Model
{
  protected $table = 'accessories_import_batches';
  public $timestamps = false;

  protected $fillable = [
    'accessories_id',
    'quantity',
  ];
  use HasFactory;
}
