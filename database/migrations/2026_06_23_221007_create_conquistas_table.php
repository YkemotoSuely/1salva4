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
        Schema::create('conquistas', function (Blueprint $table) {
            $table->id();

            $table->foreignId('doador_id')
                ->constrained('doadores')
                ->onDelete('cascade');

            $table->foreignId('selo_id')
                ->constrained('selos')
                ->onDelete('cascade');

            $table->date('data_conquista');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conquistas');
    }
};
