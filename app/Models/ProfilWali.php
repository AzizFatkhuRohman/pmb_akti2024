<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilWali extends Model
{
    use HasFactory;
    protected $table='profil_wali';
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
