<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentos', function (Blueprint $table) {
            $table->id();

            $table->string('nome_arquivo')->nullable();

            $table->string('identificacao_arquivo');
            $table->string('sufixo_arquivo')->nullable();
            $table->integer('quadro_assinaturas')->default(1);
            $table->integer('id_documento_status')->nullable();

            # -- ou url documento ou faz upload --
            $table->string('url_documento')->nullable();
            $table->string('file_path')->nullable();

            // -- esse id_externo é o id na assine bem (id_identifier)
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
        Schema::dropIfExists('documentos');
    }
}
