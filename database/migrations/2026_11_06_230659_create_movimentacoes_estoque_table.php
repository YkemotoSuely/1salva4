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
        Schema::create('movimentacoes_estoque', function (Blueprint $table) {

            $table->id();

            // Hemocentro responsável pela movimentação
            $table->foreignId('hemocentro_id')
                ->constrained('hemocentros')
                ->restrictOnDelete();

            // Unidade de hemocomponente movimentada
            $table->foreignId('componente_id')
                ->constrained('componentes')
                ->restrictOnDelete();

            // Usuário responsável pelo registro da movimentação
            $table->foreignId('usuario_id')
                ->constrained('users')
                ->restrictOnDelete();

            // Tipo de operação realizada
            $table->string('tipo_movimentacao', 30);

            // Identifica movimentações pertencentes à mesma transferência
            $table->uuid('transferencia_id')->nullable()->index();

            // Data e hora da movimentação
            $table->dateTime('data_movimentacao');

            // Informações complementares
            $table->text('observacao')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movimentacoes_estoque');
    }
};
