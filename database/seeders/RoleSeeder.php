<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Riz Admin',
            'email' => 'Adminriz@gmail.com',
            'role_id' => 2,
            'password' => Hash::make('riz-admin123'),
            'email_verified_at' => now(),
        ]);

        User::create([
            'name' => 'Riz Manager',
            'email' => 'Managerriz@gmail.com',
            'role_id' => 1,
            'password' => Hash::make('riz-manager123'),
            'email_verified_at' => now(),
        ]);
    }
}
