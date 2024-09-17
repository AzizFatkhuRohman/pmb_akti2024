<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;
    protected $table='pendidikan';
    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function Edit($id,$data){
        return $this->find($id)->update($data);
    }
}
