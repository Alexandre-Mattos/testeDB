<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocacaoProprietarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel_proprietario', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('imovel_id');
            $table->unsignedInteger('cliente_id');
            $table->timestamps();

            $table->foreign('imovel_id')
                ->on('imovel')
                ->references('id');

            $table->foreign('cliente_id')
                ->on('cliente')
                ->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('locacao_proprietario');
    }
}
