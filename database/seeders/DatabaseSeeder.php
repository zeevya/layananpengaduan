<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin Test',
            'nip' => '12345678', // Sesuai dengan format NIP yang dipakai
            'password' => Hash::make('password123'), // Password yang bisa dipakai buat login
        ]);
    }
}