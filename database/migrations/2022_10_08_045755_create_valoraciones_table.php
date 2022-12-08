<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('valoracions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('carreras_id');
            $table->foreign('carreras_id')->references('id')->on('carreras')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('cant_estrellas');
            $table->text('comentarios')->nullable()->default('text');
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
        Schema::dropIfExists('valoracions');
    }
};
