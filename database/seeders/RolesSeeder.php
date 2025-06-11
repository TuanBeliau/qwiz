<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[
            \Spatie\Permission\PermissionRegistrar::class
        ]->forgetCachedPermissions();

        if (Role::where('name', 'super_admin')->exists()) {
            return;
        }

        Role::create(['name' => 'super_admin']);
        Role::create(['name' => 'student']);
        Role::create(['name' => 'teacher']);
    }
}
