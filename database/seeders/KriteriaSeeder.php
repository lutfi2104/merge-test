<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kriterias = [
            [
                'kode' => rand(999, 10000),
                'name' => 'Appearance'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Taste'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Flavor'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Texture'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Color'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Partical Size (mm)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution:<Mesh No.4 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution:Mesh No.4 - No 6(%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Bulk Density (g/ml)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Salinity %'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Moisture %'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'ALT (colony/g)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Enterobacteriaceae (colony/g)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Salmonella sp. (/25g)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Yeast Mould (colony/g)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution:<Mesh No. 3 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution:Mesh No. 3 – No.5 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution:> Mesh No 20 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution:< Mesh No 40 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution: Mesh No 1/4 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution:Mesh No. 1/4 – No.5 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution:Mesh No. 6 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution:Mesh No. 6 – No.10 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Granule Shape'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Filth and insect infestation'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution: Mesh No 20 (%) Max'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Particle Size Distribution: Mesh No. 5 – No.6 (%)'
            ],
            [
                'kode' => rand(999, 10000),
                'name' => 'Screen (mm)'
            ],
        ];

        foreach ($kriterias as $kriteria) {
            Kriteria::create(['name' => $kriteria['name'], 'kode' => $kriteria['kode']]);
        }
    }
}
