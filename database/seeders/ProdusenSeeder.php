<?php

namespace Database\Seeders;

use App\Models\supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;


class ProdusenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        supplier::factory()->count(10)->create();
    }
}
