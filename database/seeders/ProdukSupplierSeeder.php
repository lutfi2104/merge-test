<?php

namespace Database\Seeders;

use App\Models\produkSupplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdukSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        produkSupplier::factory()->count(10)->create();
    }
}
