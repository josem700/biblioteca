<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LibrosPrestados;
use Faker\Generator as Faker;

$factory->define(LibrosPrestados::class, function (Faker $faker) {
    return [
        'user_id'=> factory(\App\Usuario::class),
        'libro_id'=> factory(\App\Libro::class)
    ];
});
