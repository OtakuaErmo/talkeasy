<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('likes', function (Blueprint $table) {
            $table->unsignedBigInteger("usuario_id");
            $table->unsignedBigInteger("sugestao_id");
            $table->foreign("usuario_id")->references('id')->on('users')->onDelete('cascade');
            $table->foreign("sugestao_id")->references('id')->on('sugestoes')->onDelete('cascade');
            $table->primary(['sugestao_id', 'usuario_id']);
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
        Schema::dropIfExists('likes');
    }
}
