<?php

namespace App\Imports;
use App\Models\NamaProduk;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class nama_produkImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new NamaProduk([
            'kode_prd' => $row['kode_prd'],
            'nama_prd' => $row['nama_prd'],

        ]);
    }

    public function rules(): array
    {
        return [
            'kode_prd' => 'required|unique:nama_produks',
            'nama_prd' => 'required|unique:nama_produks',

        ];
    }
}
