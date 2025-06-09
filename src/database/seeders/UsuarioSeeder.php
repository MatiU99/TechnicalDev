<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    public function run(): void
    {
        // Usuario normal
        User::create([
            'name' => 'UserTest',
            'email' => 'user@test.com',
            'password' => Hash::make('  '),
            'role' => 'usuario',
        ]);

        // Agente
        User::create([
            'name' => 'AgentTest',
            'email' => 'agent@test.com',
            'password' => Hash::make('password'),
            'role' => 'agente',
        ]);
    }
}
