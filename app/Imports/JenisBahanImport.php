<?php

namespace App\Imports;

use App\Models\produkSupplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Illuminate\Support\Facades\Log;

class JenisBahanImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
{
    try {
        // Log data array $row
        Log::info('Importing data: ' . json_encode($row));

        // Generate kode_jenis secara otomatis dari tiga angka yang diacak
        do {
            $kode_jenis = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
        } while (produkSupplier::where('kode_jenis', $kode_jenis)->exists());

        // Membuat model produkSupplier dengan data dari array $row
        $produkSupplier = new produkSupplier([
            'kode_jenis' => $kode_jenis,
            'jenis_produk' => $row['jenis_produk'],
        ]);

        // Menyimpan model ke dalam database
        $produkSupplier->save();

        // Log pesan sukses
        Log::info('Data imported successfully: ' . json_encode($row));

        // Mengembalikan model
        return $produkSupplier;
    } catch (\Exception $e) {
        // Log pesan kesalahan
        Log::error('Error during import: ' . $e->getMessage());

        // Mengembalikan null untuk mengabaikan data yang bermasalah
        return null;
    }
}


    public function rules(): array
    {
        return [
            'jenis_produk' => 'required',
        ];
    }
}
