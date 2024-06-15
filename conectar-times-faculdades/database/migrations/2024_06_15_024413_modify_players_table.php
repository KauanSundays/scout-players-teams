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
        Schema::table('players', function (Blueprint $table) {
            // Verifica se as colunas já não existem antes de adicioná-las
            if (!Schema::hasColumn('players', 'nome')) {
                $table->string('nome');
            }

            if (!Schema::hasColumn('players', 'position_id')) {
                $table->unsignedBigInteger('position_id');
                $table->foreign('position_id')->references('id')->on('positions')->onDelete('cascade');
            }

            if (!Schema::hasColumn('players', 'avaliador_id')) {
                $table->unsignedBigInteger('avaliador_id');
                $table->foreign('avaliador_id')->references('id')->on('users')->onDelete('cascade');
            }

            if (!Schema::hasColumn('players', 'nota')) {
                $table->integer('nota');
            }

            if (!Schema::hasColumn('players', 'observacoes')) {
                $table->text('observacoes')->nullable();
            }

            if (!Schema::hasColumn('players', 'idade')) {
                $table->integer('idade');
            }

            if (!Schema::hasColumn('players', 'estado')) {
                $table->string('estado');
            }

            if (!Schema::hasColumn('players', 'cidade')) {
                $table->string('cidade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('players', function (Blueprint $table) {
            // Removendo as colunas se necessário
            if (Schema::hasColumn('players', 'nome')) {
                $table->dropColumn('nome');
            }

            if (Schema::hasColumn('players', 'position_id')) {
                $table->dropForeign(['position_id']);
                $table->dropColumn('position_id');
            }

            if (Schema::hasColumn('players', 'avaliador_id')) {
                $table->dropForeign(['avaliador_id']);
                $table->dropColumn('avaliador_id');
            }

            if (Schema::hasColumn('players', 'nota')) {
                $table->dropColumn('nota');
            }

            if (Schema::hasColumn('players', 'observacoes')) {
                $table->dropColumn('observacoes');
            }

            if (Schema::hasColumn('players', 'idade')) {
                $table->dropColumn('idade');
            }

            if (Schema::hasColumn('players', 'estado')) {
                $table->dropColumn('estado');
            }

            if (Schema::hasColumn('players', 'cidade')) {
                $table->dropColumn('cidade');
            }
        });
    }
};
