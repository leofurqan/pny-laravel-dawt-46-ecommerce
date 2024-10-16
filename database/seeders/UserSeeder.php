<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'first_name' => 'Hafiz',
            'last_name' => 'Furqan',
            'email' => 'furqan@demo.com',
            'phone' => '03208472627',
            'password' => Hash::make('12345678')
        ]);
    }
}
