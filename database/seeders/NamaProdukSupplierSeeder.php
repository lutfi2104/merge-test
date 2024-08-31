<?php

namespace Database\Seeders;

use App\Models\namaProduk_supplier;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NamaProdukSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        namaProduk_supplier::factory()->count(10)->create();
    }
}
