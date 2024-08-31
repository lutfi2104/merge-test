<?php

namespace Database\Seeders;

use App\Models\Ujirm;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UjirmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ujirm::factory()->count(10)->create();
    }
}
