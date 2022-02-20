<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = [];


    public function usuario(){
        return $this->belongsTo(Usuario::class, 'id');
    }

    
}
