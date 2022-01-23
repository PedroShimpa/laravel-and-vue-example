<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFofocasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fofocas', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignId('users')->nullable();
            $table->tinyText('anonima')->default('NÃO');
            $table->longText('conteudo')->nullable();
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
        Schema::dropIfExists('fofocas');
    }
}
