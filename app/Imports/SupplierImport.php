<?php

namespace App\Imports;

use App\Models\supplier;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SupplierImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
   */
    public function model(array $row)
    {

        return new supplier([
            'nama_supplier' => $row['nama_supplier'],
            'nama_produsen' => $row['nama_produsen'],
            'asal_produsen' => $row['asal_produsen'],
            'asal_supplier' => $row['asal_supplier'],
            'alamat1' => $row['alamat1'],
            'alamat2' => $row['alamat2'],
            'no_tlp' => $row['no_telp'],
            'nama_pic' => $row['nama_pic'],
            'jabatan' => $row['jabatan'],
            'email' => $row['email'],
            'no_hp' => $row['no_hp'],

        ]);
    }
    public function rules(): array
    {
        return [
            'nama_supplier' => 'nullable',
            'nama_produsen' => 'required',
            'asal_produsen' => 'required',
            'asal_supplier' => 'nullable',
            'alamat1' => 'required',
            'alamat2' => 'nullable',
            'no_telp' => 'nullable',
            'nama_pic' => 'required',
            'jabatan' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
        ];
    }
}
