<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagamentoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagamento', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('empresa_id');
            $table->unsignedInteger('conta_id');
            $table->float('valor');
            $table->date('data_pagamento');
            $table->enum('status', [
                'sucesso',
                'erro',
            ])->default('sucesso');
            $table->timestamps();

            $table->foreign('empresa_id')
                ->on('empresa')
                ->references('id');

            $table->foreign('conta_id')
                ->on('conta')
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
        Schema::dropIfExists('pagamento');
    }
}
