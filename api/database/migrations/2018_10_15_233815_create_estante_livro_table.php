<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEstanteLivroTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estante_livro', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('prateleira');
            $table->unsignedInteger('id_estante');
            $table->unsignedInteger('id_livro');
            $table->foreign('id_estante')->references('id')->on('estantes')->onDelete('cascade');
            $table->foreign('id_livro')->references('id')->on('livros')->onDelete('cascade');
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
        Schema::dropIfExists('estante_livro');
    }
}
