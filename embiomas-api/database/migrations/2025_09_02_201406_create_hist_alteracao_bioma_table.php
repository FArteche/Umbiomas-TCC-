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
        Schema::create('hist_alteracao_bioma', function (Blueprint $table) {
            $table->id('id_hist');
            //$table->foreignId('bioma_id')->constrained('biomas', 'id_bioma')->onDelete('cascade')->nullable();
            $table->foreignid('user_id')->constrained('users')->onDelete('cascade');

            $table->morphs('loggable');

            $table->enum('tipo_alteracao', ['criacao', 'edicao', 'exclusao']);
            $table->text('detalhes_alteracao')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hist_alteracao_bioma');
    }
};
