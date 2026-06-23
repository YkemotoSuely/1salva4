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
        Schema::create('pontuacoes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('doador_id')
                ->constrained('doadores')
                ->onDelete('cascade');

            $table->integer('pontos')
                ->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pontuacoes');
    }
};
