<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Template; // Import model Template
use App\Models\Kriteria; // Import model Kriteria

class TemplateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Dry Default',
                'kriteria_ids' => [1, 2, 3, 4, 5, 9, 10, 11, 18, 19, 24], // Ganti dengan data kriteria_ids yang sesuai
            ],
            [
                'name' => 'Bubble Crumbs Default',
                'kriteria_ids' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 24], // Ganti dengan data kriteria_ids yang sesuai
            ],
            [
                'name' => 'Dry Default Plus Mikro',
                'kriteria_ids' => [1, 2, 3, 4, 5, 9, 10, 11, 12, 13, 14, 15, 18, 19, 24], // Ganti dengan data kriteria_ids yang sesuai
            ],
            [
                'name' => 'Fresh Default',
                'kriteria_ids' => [1, 2, 3, 4, 5, 10, 11, 25, 26], // Ganti dengan data kriteria_ids yang sesuai
            ],
            [
                'name' => 'Fresh Default Plus Mikro',
                'kriteria_ids' => [1, 2, 3, 4, 5, 10, 11, 12, 13, 14, 15, 25, 26], // Ganti dengan data kriteria_ids yang sesuai
            ],
            [
                'name' => 'Bubble Crumbs Default Plus 20 max & 40 min',
                'kriteria_ids' => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 24, 26, 27], // Ganti dengan data kriteria_ids yang sesuai
            ],
            [
                'name' => 'Bubble Crumbs 6 & 10',
                'kriteria_ids' => [1, 2, 3, 4, 5, 6, 9, 10, 11, 22, 23, 24], // Ganti dengan data kriteria_ids yang sesuai
            ],
            [
                'name' => 'Bubble Crumbs 1/4 & 1/4 - 5',
                'kriteria_ids' => [1, 2, 3, 4, 5, 6, 9, 10, 11, 20, 21, 24], // Ganti dengan data kriteria_ids yang sesuai
            ],
            // Tambahkan data lain sesuai kebutuhan
        ];

        foreach ($data as $item) {
            $kriteriaIds = $item['kriteria_ids'];
            // $kriteriaIds = array_map('strval', $kriteriaIds); // Ubah ID menjadi string

            $kriteriaJson = json_encode($kriteriaIds);

            Template::create([
                'name' => $item['name'],
                'kriteria_id' => $kriteriaJson,
            ]);
        }
    }
}
