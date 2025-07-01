<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; 

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Admin kinerjadesa',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'), 
            'status' => 'approved',
            'role_id' => 1, // '1' untuk admmin role
        ]);
    }
}
