<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSedeer extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!User::where('email', 'cieljp@gmail.com')->first()) {
            User::create([
                'name' => 'Francisco Maxwell',
                'email' => 'cieljp@gmail.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
                'role' => 'admin',
                'status' => '1'
            ]);
        }

        if(!User::where('email', 'teste1@gmail.com')->first()) {
            User::create([
                'name' => 'Teste1',
                'email' => 'teste1@gmail.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
                'role' => 'client',
                'status' => '1'
            ]);
        }

        if(!User::where('email', 'teste2@gmail.com')->first()) {
            User::create([
                'name' => 'Teste2',
                'email' => 'teste2@gmail.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
                'role' => 'client',
                'status' => '1'
            ]);
        }

        if(!User::where('email', 'teste3@gmail.com')->first()) {
            User::create([
                'name' => 'Teste3',
                'email' => 'teste3@gmail.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
                'role' => 'client',
                'status' => '1'
            ]);
        }

        if(!User::where('email', 'teste4@gmail.com')->first()) {
            User::create([
                'name' => 'Teste4',
                'email' => 'teste4@gmail.com',
                'password' => Hash::make('123456', ['rounds' => 12]),
                'role' => 'client',
                'status' => '1'
            ]);
        }
    }
}