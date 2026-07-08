<?php

namespace Database\Seeders;

use App\Models\Doador;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DoadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Doador::create([
            'nome' => 'Ana Souza',
            'cpf' => '11111111111',
            'tipo_sanguineo' => 'A+',
            'cidade' => 'São Paulo',
            'telefone' => '(11)99999-1111',
            'proxima_doacao' => '2026-09-01'
        ]);

        Doador::create([
            'nome' => 'Carlos Lima',
            'cpf' => '22222222222',
            'tipo_sanguineo' => 'O-',
            'cidade' => 'Campinas',
            'telefone' => '(19)99999-2222',
            'proxima_doacao' => '2026-10-15'
        ]);

        Doador::create([
            'nome' => 'Juliana Rocha',
            'cpf' => '33333333333',
            'tipo_sanguineo' => 'B+',
            'cidade' => 'Sorocaba',
            'telefone' => '(15)99999-3333',
            'proxima_doacao' => '2026-08-20'
        ]);

        Doador::create([
            'nome' => 'Liliana Reis',
            'cpf' => '44444444444',
            'tipo_sanguineo' => 'AB+',
            'cidade' => 'Sorocaba',
            'telefone' => '(15)99999-3333',
            'proxima_doacao' => '2026-09-17'
        ]);

        Doador::create([
            'nome' => 'Ricardo Bueno',
            'cpf' => '55555555555',
            'tipo_sanguineo' => 'A+',
            'cidade' => 'Campinas',
            'telefone' => '(19)99999-5555',
            'proxima_doacao' => '2026-11-25'
        ]);
    }
    
}

