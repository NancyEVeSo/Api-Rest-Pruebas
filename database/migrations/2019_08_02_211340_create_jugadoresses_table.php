<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJugadoressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('jugadoresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('idequipo');
            $table->string('nombre');
            $table->string('apellido');
            $table->string('edad');
            $table->string('pais');
            $table->timestamps();
            $table->foreign('idequipo')->references('id')->on('equiposses');
           // $table->foreign('idequipo')->references('id')->on('equiposses');
        });
    }
    

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jugadoresses');
    }
}
