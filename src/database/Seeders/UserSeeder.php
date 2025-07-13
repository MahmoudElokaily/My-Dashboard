<?php

namespace Elokaily\Dashboard\database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run() {
        User::create([
            'name' => 'Mahmoud Elokaily',
            'email' => 'mahmoud@example.com',
            'password' => Hash::make('123456789'),
        ]);
    }
}
