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
        Schema::create('componentes', function (Blueprint $table) {
            $table->id();

            $table->foreignId('doacao_id')
              ->constrained('doacoes')
              ->onDelete('cascade');

            $table->string('tipo_sanguineo',3);

            $table->string('hemocomponente',50);

            $table->integer('quantidade');

            $table->date('validade');

            $table->string('status',45);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('componentes');
    }
};
