<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conta', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('empresa_id');
            $table->unsignedInteger('locacao_id');
            $table->float('valor');
            $table->date('data_vencimento');
            $table->enum('status', [
                'paga',
                'em_aberto',
            ])->default('em_aberto');
            $table->timestamps();

            $table->foreign('empresa_id')
                ->on('empresa')
                ->references('id');

            $table->foreign('locacao_id')
                ->on('locacao')
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
        Schema::dropIfExists('conta');
    }
}
