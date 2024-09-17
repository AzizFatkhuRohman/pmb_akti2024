<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfilIbu extends Model
{
    use HasFactory;
    protected $table='profil_ibu';
    protected $guarded=[];
    public function user(){
        return $this->belongsTo(User::class);
    }
}
