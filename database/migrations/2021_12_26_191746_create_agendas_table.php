<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();

            $table->string('nome');
            $table->integer('rg')->nullable();
            $table->bigInteger('cpf')->nullable();
            $table->string('email')->nullable();
            $table->integer('ddd')->nullable();
            $table->integer('telefone')->nullable();

            // -- esse id_externo é o id na assine bem
            $table->string('id_externo')->nullable();

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
        Schema::dropIfExists('agendas');
    }
}
