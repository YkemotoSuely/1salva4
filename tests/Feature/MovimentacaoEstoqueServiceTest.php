<?php

use App\Services\MovimentacaoEstoqueService;
use Illuminate\Validation\ValidationException;
use App\Models\User;
use Illuminate\Support\Facades\DB;

/*O método registrarSaida() aceita somente dois motivos:
- UTILIZACAO
- DESCARTE 
- EMPRESTIMO, o Laravel deve lançar uma ValidationException, impedindo a operação*/

test('impede saida com motivo invalido', function () {

    $this->expectException(ValidationException::class);

    app(MovimentacaoEstoqueService::class)->registrarSaida([
        'hemocentro_id' => 1,
        'componente_id' => 1,
        'usuario_id' => 1,
        'motivo_saida' => 'EMPRESTIMO',
    ]);

});

test('impede saida de componente sem entrada registrada', function () {

    $usuario = User::factory()->create([
        'tipo_usuario' => 'hemocentro',
    ]);

    $hemocentroId = DB::table('hemocentros')->insertGetId([
        'nome' => 'Hemocentro Teste',
        'logradouro' => 'Rua dos Testes',
        'numero' => '100',
        'bairro' => 'Centro',
        'cidade' => 'Marília',
        'estado' => 'SP',
        'cep' => '17500000',
    ]);

    $doadorId = DB::table('doadores')->insertGetId([
        'nome' => 'Doador Teste',
        'cpf' => '00000000000',
        'tipo_sanguineo' => 'O+',
        'cidade' => 'Marília',
        'telefone' => '14999999999',
    ]);

    $doacaoId = DB::table('doacoes')->insertGetId([
        'doador_id' => $doadorId,
        'hemocentro_id' => $hemocentroId,
        'data' => today()->toDateString(),
    ]);

    $componenteId = DB::table('componentes')->insertGetId([
        'doacao_id' => $doacaoId,
        'tipo_sanguineo' => 'O+',
        'hemocomponente' => 'CONCENTRADO_HEMACIAS',
        'quantidade' => 1,
        'validade' => today()->addDays(30)->toDateString(),
        'status' => 'DISPONIVEL',
        'codigo_identificacao' => 'TESTE-CH-001',
    ]);

    /* try: tentará registrar a saída do hemocomponente.
    catch: capturará a exceção que esperamos receber, pois não existe uma entrada anterior.*/
    try {
        app(MovimentacaoEstoqueService::class)->registrarSaida([
            'hemocentro_id' => $hemocentroId,
            'componente_id' => $componenteId,
            'usuario_id' => $usuario->id,
            'motivo_saida' => 'UTILIZACAO',
        ]);

        $this->fail('A saída deveria ter sido bloqueada.');

    } catch (ValidationException $e) {

        $this->assertSame(
            'Esta unidade não possui entrada registrada no estoque.',
            $e->errors()['componente_id'][0] ?? null
        );
    }

    try {
        app(MovimentacaoEstoqueService::class)->registrarSaida([
            'hemocentro_id' => $hemocentroId,
            'componente_id' => $componenteId,
            'usuario_id' => $usuario->id,
            'motivo_saida' => 'UTILIZACAO',
        ]);

        $this->fail('A saída deveria ter sido bloqueada.');
    } catch (ValidationException $e) {
        $this->assertSame(
            'Esta unidade não possui entrada registrada no estoque.',
            $e->errors()['componente_id'][0] ?? null
        );
    }

    /* O método assertDatabaseMissing() consulta o banco de testes e confirma   que não existe uma movimentação de SAÍDA para aquele hemocomponente.*/
    $this->assertDatabaseMissing('movimentacoes_estoque', [
        'componente_id' => $componenteId,
        'tipo_movimentacao' => 'SAIDA',
    ]);
});
test('impede saida duplicada de hemocomponente', function () {

    $usuario = User::factory()->create([
        'tipo_usuario' => 'hemocentro',
    ]);

    $hemocentroId = DB::table('hemocentros')->insertGetId([
        'nome' => 'Hemocentro Teste',
        'logradouro' => 'Rua dos Testes',
        'numero' => '100',
        'bairro' => 'Centro',
        'cidade' => 'Marília',
        'estado' => 'SP',
        'cep' => '17500000',
    ]);

    $doadorId = DB::table('doadores')->insertGetId([
        'nome' => 'Doador Teste',
        'cpf' => '00000000000',
        'tipo_sanguineo' => 'O+',
        'cidade' => 'Marília',
        'telefone' => '14999999999',
    ]);

    $doacaoId = DB::table('doacoes')->insertGetId([
        'doador_id' => $doadorId,
        'hemocentro_id' => $hemocentroId,
        'data' => today()->toDateString(),
    ]);

    $componenteId = DB::table('componentes')->insertGetId([
        'doacao_id' => $doacaoId,
        'tipo_sanguineo' => 'O+',
        'hemocomponente' => 'CONCENTRADO_HEMACIAS',
        'quantidade' => 1,
        'validade' => today()->addDays(30)->toDateString(),
        'status' => 'DISPONIVEL',
        'codigo_identificacao' => 'TESTE-CH-001',
    ]);

    app(MovimentacaoEstoqueService::class)->registrarEntrada([
        'hemocentro_id' => $hemocentroId,
        'componente_id' => $componenteId,
        'usuario_id' => $usuario->id,
    ]);

    app(MovimentacaoEstoqueService::class)->registrarSaida([
        'hemocentro_id' => $hemocentroId,
        'componente_id' => $componenteId,
        'usuario_id' => $usuario->id,
        'motivo_saida' => 'UTILIZACAO',
    ]);

    /* try: tenta registrar uma segunda saída para o mesmo hemocomponente.
    $this->fail(): reprova o teste se o serviço permitir a operação.
    catch: captura a exceção de validação.
    assertArrayHasKey(): verifica se a exceção contém um erro associado ao componente_id. */
    try {
        app(MovimentacaoEstoqueService::class)->registrarSaida([
            'hemocentro_id' => $hemocentroId,
            'componente_id' => $componenteId,
            'usuario_id' => $usuario->id,
            'motivo_saida' => 'UTILIZACAO',
        ]);

        $this->fail('O sistema permitiu uma saída duplicada.');
    } catch (ValidationException $e) {
        $this->assertSame(
        'Esta unidade já possui uma saída definitiva registrada.',
        $e->errors()['componente_id'][0] ?? null
        );
    }
    $this->assertDatabaseCount('movimentacoes_estoque', 2);
});