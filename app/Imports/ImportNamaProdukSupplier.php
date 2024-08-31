<?php

namespace App\Imports;

use App\Models\supplier;
use App\Models\produkSupplier;
use Illuminate\Support\Collection;
use App\Models\namaProduk_supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportNamaProdukSupplier implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    /**
     * @param Collection $collection
     */

    public function model(array $row)
    {
        $supplier = supplier::where('nama_produsen', $row['supplier_id'])->first();

        // Jika produk ditemukan, gunakan id-nya, jika tidak, beri nilai null
        $supplier_id = $supplier ? $supplier->id : null;
        $produkSupplier = produkSupplier::where('jenis_produk', $row['produk_supplier_id'])->first();
        $produkSupplier_id = $produkSupplier ? $produkSupplier->id : null;

        $masa_halal = null;
        if (!empty($row['masa_halal'])) {
            // Konversi nilai Excel ke format tanggal
            $masa_halal_excel = (int) $row['masa_halal'];
            $masa_halal_timestamp = ($masa_halal_excel - 25569) * 86400; // Konversi ke timestamp UNIX
            $masa_halal = date('Y-m-d', $masa_halal_timestamp); // Konversi ke format tanggal MySQL
        }
        return new namaProduk_supplier([
            'supplier_id' => $supplier_id,
            'produk_supplier_id' => $produkSupplier_id,
            'nama_produk' => $row['nama_produk'],
            'masa_halal' => $masa_halal,
            'by_halal' => $row['by_halal'],
            'satuan' => $row['satuan'],
            'kemasan' => $row['kemasan'],
            'berat' => $row['berat'],
            'kode' => $row['kode'],


        ]);
    }

    public function rules(): array
    {
        return [
            'supplier_id' => 'required',
            'produk_supplier_id' => 'required',
            'nama_produk' => 'required|string|unique:nama_produk_suppliers,nama_produk',
            'masa_halal' => 'nullable',
            'by_halal' => 'nullable|string',
            'satuan' => 'required|string',
            'kemasan' => 'required|string',
            'berat' => 'required|numeric',
            'kode' => 'required|string',

        ];
    }
}
