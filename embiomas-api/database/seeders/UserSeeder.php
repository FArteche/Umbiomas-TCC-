<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; // Importe o Model User
use Illuminate\Support\Facades\Hash; // Importe o Hash para a senha

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Cria um usuário padrão se ele não existir
        User::firstOrCreate(
            ['email' => 'admin@admin.com'], // Chave para verificar se já existe
            [
                'name' => 'Admin',
                'password' => Hash::make('123456789'), // Use uma senha segura!
            ]
        );
    }
}
