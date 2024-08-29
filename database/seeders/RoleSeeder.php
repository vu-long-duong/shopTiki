<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::insert([
                [
                    'id' => User::SUPER_ADMIN_ROLE,
                    'name' => 'SuperAdmin',
                    'description' => '',
                ],
                [
                    'id' => User::ADMIN_ROLE,
                    'name' => 'Admin',
                    'description' => '',
                ],
                [
                    'id' => User::USER_ROLE,
                    'name' => 'User',
                    'description' => '',
                ],
            ]);
    }
}
