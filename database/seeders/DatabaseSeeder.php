<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ShiftSeeder;
use Database\Seeders\NamaMesinSeeder;
use Database\Seeders\NamaProdukSeeder;
use Database\Seeders\DepartementSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([

            RoleSeeder::class,
            DepartementSeeder::class,
            UserSeeder::class,
            ShiftSeeder::class,
            NamaMesinSeeder::class,
            KriteriaSeeder::class,
            TemplateSeeder::class,
            ProdusenSeeder::class,
            ProdukSupplierSeeder::class,
            NamaProdukSupplierSeeder::class,
            NamaProdukSeeder::class,

            // UjirmSeeder::class,

        ]);
    }
}
