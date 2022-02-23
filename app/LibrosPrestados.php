<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LibrosPrestados extends Model
{
    public function prestados(User $user){
        return $user->hasMany(Libro::class, 'id');
    }
}
