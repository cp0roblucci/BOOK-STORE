<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FishImport extends Model
{

  protected $table = 'fish_import_batches';
  use HasFactory;
}
