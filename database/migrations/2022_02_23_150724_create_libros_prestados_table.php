<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosPrestadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros_prestados', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('libro_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('libro_id')->references('id')->on('libros');
            $table->foreign('user_id')->references('id')->on('usuarios');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros_prestados');
    }
}
