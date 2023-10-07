<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Chitietdonhang extends Model
{
    protected $table = 'chitietdonhang';
    use HasFactory;

    public function product(): MorphTo
    {
      return $this->morphTo();
    }
}
