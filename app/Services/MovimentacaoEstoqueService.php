<?php

namespace App\Services;

use App\Models\Componente;
use App\Models\MovimentacaoEstoque;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class MovimentacaoEstoqueService
{
    public function registrarEntrada(array $dados): MovimentacaoEstoque
    {
        $dados = Validator::make($dados, [
            'hemocentro_id' => 'required|integer|exists:hemocentros,id',
            'componente_id' => 'required|integer|exists:componentes,id',
            'usuario_id' => 'required|integer|exists:users,id',
            'observacao' => 'nullable|string|max:1000',
        ])->validate();

        return DB::transaction(function () use ($dados) {

            $componente = Componente::findOrFail($dados['componente_id']);

            $hemocentroOrigem = DB::table('doacoes')
                ->where('id', $componente->doacao_id)
                ->value('hemocentro_id');

            if ((int) $hemocentroOrigem !== (int) $dados['hemocentro_id']) {
                throw ValidationException::withMessages([
                    'hemocentro_id' => 'O hemocomponente não pertence a uma doação deste hemocentro.'
                ]);
            }

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
