<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoImovelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_imovel', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('empresa_id');
            $table->string('nome');
            $table->timestamps();

            $table->foreign('empresa_id')
                ->on('empresa')
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
        Schema::dropIfExists('tipo_imovel');
    }
}
