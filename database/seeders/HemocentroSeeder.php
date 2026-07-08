<?php

namespace Database\Seeders;

use App\Models\Hemocentro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HemocentroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Hemocentro::create([
            'nome' => 'Hemocentro Central',
            'logradouro' => 'Av. Paulista',
            'numero' => '1000',
            'bairro' => 'Bela Vista',
            'cidade' => 'São Paulo',
            'estado' => 'SP',
            'cep' => '01310-100',
            'telefone' => '(11) 3333-1111'
        ]);

        Hemocentro::create([
            'nome' => 'Hemovida',
            'logradouro' => 'Rua das Flores',
            'numero' => '250',
            'bairro' => 'Centro',
            'cidade' => 'Campinas',
            'estado' => 'SP',
            'cep' => '13010-500',
            'telefone' => '(19) 3333-2222'
        ]);

        Hemocentro::create([
            'nome' => 'Banco de Sangue Esperança',
            'logradouro' => 'Av. Brasil',
            'numero' => '500',
            'bairro' => 'Jardim América',
            'cidade' => 'Sorocaba',
            'estado' => 'SP',
            'cep' => '18035-200',
            'telefone' => '(15) 3333-3333'
        ]);
    }
}
