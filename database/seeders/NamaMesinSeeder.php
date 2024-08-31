<?php

namespace Database\Seeders;

use App\Models\Mesin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NamaMesinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $mesin = [
            [
                'no_mesin' => 1,
                'nama_mesin' => 'DD1'
            ],
            [
                'no_mesin' => 2,
                'nama_mesin' => 'DD2'
            ],
            [
                'no_mesin' => 3,
                'nama_mesin' => 'DD3'
            ],
            [
                'no_mesin' => 4,
                'nama_mesin' => 'DD4'
            ],
            [
                'no_mesin' => 5,
                'nama_mesin' => 'Extruder 1'
            ],
            [
                'no_mesin' => 6,
                'nama_mesin' => 'Extruder 2'
            ],
            [
                'no_mesin' => 7,
                'nama_mesin' => 'Fresh breadcrumbs'
            ],
            [
                'no_mesin' => 8,
                'nama_mesin' => 'Consumer Pack'
            ],
            [
                'no_mesin' => 9,
                'nama_mesin' => 'Extruder 3'
            ],
        ];
        foreach ($mesin as $item) {
            Mesin::create($item);
        }
    }
}
