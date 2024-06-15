<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('players', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->unsignedBigInteger('position_id');
            $table->unsignedBigInteger('avaliador_id');
            $table->integer('nota');
            $table->text('observacoes')->nullable();
            $table->integer('idade');
            $table->string('estado');
            $table->string('cidade');
            $table->timestamps();

            $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            $table->foreign('avaliador_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('players');
    }
};
