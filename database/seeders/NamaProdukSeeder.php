<?php

namespace Database\Seeders;

use App\Models\NamaProduk;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NamaProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nama_produk = [
            [
                'kode_prd' => 'A00',
                'nama_prd' => 'Off Produksi'
            ],
        ];

        foreach ($nama_produk as $item) {
            NamaProduk::create($item);
        }
    }
}
