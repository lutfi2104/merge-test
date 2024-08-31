<?php

namespace Database\Seeders;

use App\Models\Departement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Departement::create([
            'departement' => 'QAQC',
        ]);

        Departement::create([
            'departement' => 'Production',
        ]);
        Departement::create([
            'departement' => 'RnD',
        ]);
        Departement::create([
            'departement' => 'Building & Ultility',
        ]);
        Departement::create([
            'departement' => 'Sanitasi',
        ]);
        Departement::create([
            'departement' => 'HRGA',
        ]);
        Departement::create([
            'departement' => 'Technical Support',
        ]);
        Departement::create([
            'departement' => 'SCPI',
        ]);
        Departement::create([
            'departement' => 'Warehouse',
        ]);
        Departement::create([
            'departement' => 'Finance',
        ]);
        Departement::create([
            'departement' => 'Sales & Marketing',
        ]);
        Departement::create([
            'departement' => 'Purchasing',
        ]);
    }
}
