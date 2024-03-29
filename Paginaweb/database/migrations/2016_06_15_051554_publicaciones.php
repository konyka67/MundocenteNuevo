<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Publicaciones extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('publicaciones', function(Blueprint $table){
            $table->increments('id');
            $table->integer('funcionario_id')->unsigned();
            $table->foreign('funcionario_id')
                ->references('id')
                ->on('funcionarios')
                ->onDelete('cascade');
            $table->string('nombre');
            $table->string('resumen');
            $table->string('descripcion');       
            $table->enum('tipo', ['revista', 'convocatoria', 'evento']);
            $table->string('url');
            $table->date('fecha_publicacion');
            $table->date('fecha_cierre');
            $table->enum('estado', ['activa', 'inactiva'])->default('activa');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('publicaciones');
    }
}
