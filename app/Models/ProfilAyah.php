<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilAyah extends Model
{
    use HasFactory;
    protected $table='profil_ayah';
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
