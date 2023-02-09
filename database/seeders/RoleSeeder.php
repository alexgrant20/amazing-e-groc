<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::insert([
            [
                'role_id' => 1,
                'role_name' => 'User'
            ],
            [
                'role_id' => 2,
                'role_name' => 'Admin'
            ]
        ]);
    }
}
