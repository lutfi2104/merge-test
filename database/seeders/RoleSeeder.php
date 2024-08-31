<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Super Admin',
        ]);

        Role::create([
            'name' => 'Admin',
        ]);
        Role::create([
            'name' => 'Admin QC',
        ]);
        Role::create([
            'name' => 'QC',
        ]);
        Role::create([
            'name' => 'Admin PRD',
        ]);
        Role::create([
            'name' => 'Leader PRD',
        ]);
        Role::create([
            'name' => 'Spv PRD',
        ]);
        Role::create([
            'name' => 'Baking G2',
        ]);
        Role::create([
            'name' => 'Packing',
        ]);
        Role::create([
            'name' => 'Sales',
        ]);
        Role::create([
            'name' => 'Warehouse',
        ]);
        Role::create([
            'name' => 'Rnd',
        ]);
        Role::create([
            'name' => 'Purchasing',
        ]);
    }
}
