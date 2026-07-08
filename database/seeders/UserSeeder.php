<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run(): void
    {
        User::create([
            'name' => 'Maria Silva',
            'email' => 'maria@1salva4.com',
            'tipo_usuario' => 'doador',
            'password' => Hash::make('12345678'),
        ]);

        User::create([
            'name' => 'Hemocentro Central',
            'email' => 'hemocentro@1salva4.com',
            'tipo_usuario' => 'hemocentro',
            'password' => Hash::make('12345678'),
        ]);
    }
}
