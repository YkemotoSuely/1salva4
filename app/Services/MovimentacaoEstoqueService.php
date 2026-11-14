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
    public function registrarSaida(array $dados): MovimentacaoEstoque
    {
        $dados = Validator::make($dados, [
            'hemocentro_id' => 'required|integer|exists:hemocentros,id',
            'componente_id' => 'required|integer|exists:componentes,id',
            'usuario_id' => 'required|integer|exists:users,id',
            'motivo_saida' => 'required|in:UTILIZACAO,DESCARTE',
            'observacao' => 'required_if:motivo_saida,DESCARTE|nullable|string|max:1000',
        ])->validate();

        return DB::transaction(function () use ($dados) {

            /*whereKey() procura a unidade pelo seu identificador.
            lockForUpdate() solicita um bloqueio para evitar alterações concorrentes enquanto a transação estiver em andamento.
            firstOrFail() recupera o registro ou lança uma exceção caso ele não exista. */
            $componente = Componente::whereKey($dados['componente_id'])
                ->lockForUpdate()
                ->firstOrFail();

            $hemocentroOrigem = DB::table('doacoes')
                ->where('id', $componente->doacao_id)
                ->value('hemocentro_id');

            if ((int) $hemocentroOrigem !== (int) $dados['hemocentro_id']) {
                throw ValidationException::withMessages([
                    'hemocentro_id' => 'O hemocomponente não pertence a uma doação deste hemocentro.'
                ]);
            }

            $jaSaiu = MovimentacaoEstoque::where(
                'componente_id',
                $dados['componente_id']
            )
                ->where('tipo_movimentacao', 'SAIDA')
                ->exists();

            if ($jaSaiu) {
                throw ValidationException::withMessages([
                    'componente_id' => 'Esta unidade já possui uma saída definitiva registrada.'
                ]);
            }

            $temEntrada = MovimentacaoEstoque::where(
                'componente_id',
                $dados['componente_id']
            )
                ->where('tipo_movimentacao', 'ENTRADA')
                ->exists();

            if (!$temEntrada) {
                throw ValidationException::withMessages([
                    'componente_id' => 'Esta unidade não possui entrada registrada no estoque.'
                ]);
            }

            if (
                $dados['motivo_saida'] === 'UTILIZACAO'
                && $componente->status !== 'DISPONIVEL'
            ) {
                throw ValidationException::withMessages([
                    'componente_id' => 'Somente hemocomponentes disponíveis podem ser utilizados.'
                ]);
            }
            /*Carbon::parse(): interpreta a data de validade cadastrada.
                 startOfDay(): considera apenas a data, sem interferência do horário.
                 lt(today()): verifica se a validade é anterior à data atual.
                A verificação só se aplica à UTILIZACAO, pois uma unidade vencida ainda poderá ser registrada como descartada.
                */
            if (
                $dados['motivo_saida'] === 'UTILIZACAO'
                && \Carbon\Carbon::parse($componente->validade)->startOfDay()->lt(today())
            ) {
                throw ValidationException::withMessages([
                    'componente_id' => 'Este hemocomponente está vencido e não pode ser utilizado.'
                ]);
            }

            if (in_array($componente->status, ['UTILIZADO', 'DESCARTADO'], true)) {
                throw ValidationException::withMessages([
                    'componente_id' => 'Este hemocomponente já possui um status definitivo e não pode sair novamente.'
                ]);
            }

            $novoStatus = $dados['motivo_saida'] === 'UTILIZACAO'
                ? 'UTILIZADO'
                : 'DESCARTADO';

            $movimentacao = MovimentacaoEstoque::create([

                'hemocentro_id' => $dados['hemocentro_id'],
                'componente_id' => $dados['componente_id'],
                'usuario_id' => $dados['usuario_id'],
                'tipo_movimentacao' => 'SAIDA',
                'motivo_saida' => $dados['motivo_saida'],
                'data_movimentacao' => now(),
                'observacao' => $dados['observacao'] ?? null,
            ]);

            $componente->status = $novoStatus;
            $componente->save();

            return $movimentacao;
        });
    }
}
