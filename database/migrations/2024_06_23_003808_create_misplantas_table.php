<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMisplantasTable extends Migration
{
    public function up()
    {
        Schema::create('misplantas', function (Blueprint $table) {
            $table->id('id_misplantas');
            $table->foreignId('usuario_id_usuario')->references('id_usuario')->on('usuario');
            $table->unique('usuario_id_usuario');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('misplantas');
    }
}
