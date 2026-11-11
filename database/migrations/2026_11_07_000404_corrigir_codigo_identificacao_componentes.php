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
        if (!Schema::hasColumn('componentes', 'codigo_identificacao')) {
            Schema::table('componentes', function (Blueprint $table) {
                $table->string('codigo_identificacao', 100)->unique();
            });
        }
    }

    public function down(): void
    {
    // Esta migration é corretiva.
    // Não remove a coluna porque ela também é gerenciada
    // pela migration add_codigo_identificacao_to_componentes_table.
    }
};
