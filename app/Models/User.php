<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    protected $table = 'nguoidung';
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'ND_Ma';
    protected $fillable = [
        'VT_Ma',
        'ND_Ten',
        'ND_DiaChi',
        'ND_Email',
        'ND_SDT',
        'password',
        'ND_avt'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    // public function getAuthPassword()
    // {
    //   return $this->ND_MatKhau;
    // }
    public function isAdmin() : bool {
        if (Auth::check()) {
            $role = Auth::user()->VT_Ma;
        }
        if ($role == 1)
            return true;
        return false;
    }

  public function orders()
  {
    return $this->hasMany(Donhang::class);
  }
 

}
