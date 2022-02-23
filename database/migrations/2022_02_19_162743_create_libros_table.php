<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->increments("id")->unique()->primary();
            $table->string("titulo");
            $table->string("descripcion");
            $table->datetime("prestado")->nullable();
            $table->datetime("devuelto")->nullable();
            $table->timestamps();
            
            $table->foreign('id')->references('libro_id')->on('libros_prestados');

        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
                               