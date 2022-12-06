<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImoveisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imovel', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('empresa_id');
            $table->unsignedInteger('tipo_imovel_id');
            $table->unsignedInteger('cidade_id');

            $table->string('nome');
            $table->string('descricao');
            $table->enum('status', [
                'Ativo',
                'Locado',
            ]);
            $table->timestamps();

            $table->foreign('empresa_id')
                ->on('empresa')
                ->references('id');

            $table->foreign('tipo_imovel_id')
                ->on('tipo_imovel')
                ->references('id');

            $table->foreign('cidade_id')
                ->on('cidade')
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
        Schema::dropIfExists('imoveis');
    }
}
