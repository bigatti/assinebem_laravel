<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentoPartesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documento_partes', function (Blueprint $table) {
            $table->id();
            # -- fk com documento
            $table->foreignId('documento_id');
            $table->foreign('documento_id')->references('id')->on('documentos');
            # -- fk com a parte
            $table->foreignId('parte_documento_id');
            $table->foreign('parte_documento_id')->references('id')->on('agendas');

            # -- dados da assine bem ---
            $table->string('id_externo')->nullable();
            $table->integer('id_status_pessoa_parte')->nullable();
            $table->string('identificacao_parte')->nullable();

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
        Schema::dropIfExists('documento_partes');
    }
}
