<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'nip' => 'PG1',
            'nama' => 'Bagas Kara',
            'email' => 'bagas@example.com',
            'posisi' => 'Staff IT',
        ]);

        User::create([
            'nip' => 'PG2',
            'nama' => 'Rina Putri',
            'email' => 'rina@example.com',
            'posisi' => 'HRD',
        ]);

        User::create([
            'nip' => 'PG3',
            'nama' => 'Roji',
            'email' => 'roji@example.com',
            'posisi' => 'Staff IT',
        ]);

        User::create([
            'nip' => 'PG4',
            'nama' => 'Rudi',
            'email' => 'rudi@example.com',
            'posisi' => 'HRD',
        ]);
    }
}
