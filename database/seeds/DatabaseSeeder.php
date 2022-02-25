<?php

use App\Libro;
use App\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        //crear usuarios
        $this->call(UsuarioSeeder::class);
        factory(Usuario::class, 500)->create();


        $this->call(LibroSeeder::class);
        factory(Libro::class, 200)->create();

        $this->call(LibroSeeder::class);
        factory(Libro::class, 200)->create();



        for ($i=0;$i<30;$i++){
            $usuario = Usuario::all()->random();

            $libro = Libro::all()->random()->id;
            $usuario->libros()->attach($libro);
        }
    }
}
