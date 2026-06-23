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
        Schema::create('hemocentros', function (Blueprint $table) {
            $table->id();

            $table->string('nome',100);

            $table->string('logradouro',100);

            $table->string('numero',10);

            $table->string('bairro',50);

            $table->string('cidade',80);

            $table->char('estado',2);

            $table->string('cep',9);

            $table->string('telefone',20)->nullable();

            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hemocentros');
    }
};
