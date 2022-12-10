<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locacao', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('imovel_id');
            $table->date('inicio_periodo');
            $table->date('fim_periodo');
            $table->integer('duracao');
            $table->enum('status', [
                'Ativa',
                'Finalizada',
            ]);
            $table->float('valor');
            $table->timestamps();

            $table->foreign('imovel_id')
                ->on('imovel')
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
        Schema::dropIfExists('locacao');
    }
}
