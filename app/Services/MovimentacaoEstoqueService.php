<?php

namespace App\Services;

use App\Models\MovimentacaoEstoque;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class MovimentacaoEstoqueService
{
    public function registrarEntrada(array $dados): MovimentacaoEstoque
    {
        return DB::transaction(function () use ($dados) {

            $jaMovimentado = MovimentacaoEstoque::where(
                'componente_id',
                $dados['componente_id']
            )->exists();

            if ($jaMovimentado) {
                throw ValidationException::withMessages([
                    'componente_id' => 'Esta unidade já possui movimentações registradas.'
                ]);
            }

            return MovimentacaoEstoque::create([
                'hemocentro_id' => $dados['hemocentro_id'],
                'componente_id' => $dados['componente_id'],
                'usuario_id' => $dados['usuario_id'],
                'tipo_movimentacao' => 'ENTRADA',
                'data_movimentacao' => now(),
                'observacao' => $dados['observacao'] ?? null,
            ]);
        });
    }
}
