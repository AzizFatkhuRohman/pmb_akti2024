<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',
        'email',
        'role',
        'password',
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

    public function mahasiswa(){
        return $this->hasOne(Mahasiswa::class);
    }
    public function pendidikan(){
        return $this->hasOne(Pendidikan::class);
    }
    public function profilAyah(){
        return $this->hasOne(ProfilAyah::class);
    }
    public function profilIbu(){
        return $this->hasOne(ProfilIbu::class);
    }
    public function profilWali(){
        return $this->hasOne(ProfilWali::class);
    }
    public function profilSaudara(){
        return $this->hasOne(ProfilSaudara::class);
    }
}
