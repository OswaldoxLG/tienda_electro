<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $password = "qwerty";

        $user = new User([
            'name' => 'Oswaldo',
            'email' => 'al222310325@gmail.com',
            'role' => 'administrador',
            'password' => Hash::make($password),
        ]);
        $user->save();

    }
}
