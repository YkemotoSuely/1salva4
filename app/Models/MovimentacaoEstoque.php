<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MovimentacaoEstoque extends Model
{
  // Tabela correspondente no banco de dados
    protected $table = 'movimentacoes_estoque';

    // Campos permitidos para preenchimento
    protected $fillable = [
        'hemocentro_id',
        'componente_id',
        'usuario_id',
        'tipo_movimentacao',
        'motivo_saida',
        'transferencia_id',
        'data_movimentacao',
        'observacao',
    ];

    // Conversão automática de tipos
    protected $casts = [
        'data_movimentacao' => 'datetime',
    ];

    // Relacionamento com o hemocentro
    public function hemocentro()
    {
        return $this->belongsTo(Hemocentro::class);
    }

    // Relacionamento com o hemocomponente
    public function componente()
    {
        return $this->belongsTo(Componente::class);
    }

    // Relacionamento com o usuário responsável
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
