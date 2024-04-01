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
        User::truncate();
        User::factory()->create([
            'username' => 'user',
            'password' => Hash::make(123456),
            'name' => 'User Test',
            'phone' => '08159288490',
        ]);
        User::factory()->count(9)->create();
    }
}
