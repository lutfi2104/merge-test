<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\shift;
use Illuminate\Database\Seeder;

class ShiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        shift::create([
            'shift' => 1,
        ]);

        shift::create([
            'shift' => 2,
        ]);
        shift::create([
            'shift' => 3,
        ]);
    }
}
