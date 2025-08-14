<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Ramsey\Uuid\Uuid;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::insert([

            'uuid' => (string) Uuid::uuid4()->toString(),
            'username' => 'admin',
            'name' => 'Administrator',
            'role' => 'Admin',
            'password' => Hash::make('1234qwer'),

        ]);

        User::insert([

            'uuid' => (string) Uuid::uuid4()->toString(),
            'username' => 'pengurus1',
            'name' => 'Pengurus 1',
            'role' => 'Pengurus',
            'password' => Hash::make('123456'),

        ]);
    }
}
