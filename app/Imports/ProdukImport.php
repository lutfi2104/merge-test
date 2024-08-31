<?php

namespace App\Imports;

use Throwable;
use App\Models\Produk;
use App\Models\Template;
use App\Models\NamaProduk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Validators\ValidationException;

class ProdukImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Mencari template berdasarkan nama yang ada di Excel
        $template = Template::where('name', $row['template_id'])->first();

        // Jika template ditemukan, gunakan id-nya, jika tidak, beri nilai null
        $template_id = $template ? $template->id : null;

        return new Produk([
            'name' => $row['name'],
            'jenis' => $row['jenis'], // Tetap menggunakan nilai jenis dari Excel
            'template_id' => $template_id,
            'kode_produk' => $row['kode_produk'],
            'expired' => $row['expired'],
            'color' => $row['color'],
            'texture' => $row['texture'],
            'flavor' => $row['flavor'],
            'granule' => $row['granule'],
            'appearance' => $row['appearance'],
            'packaging' => $row['packaging'],
            'taste' => $row['taste'],
            'partical_size' => $row['partical_size'],
            'screen_mm' => $row['screen_mm'],
            'filth_insect' => $row['filth_insect'],
        ]);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|unique:produks|string',
            'jenis' => 'required|string',
            'template_id' => 'required|string',
            'kode_produk' => 'required|unique:produks|string',
            'expired' => 'required|numeric',
            'color' => 'required|string',
            'texture' => 'required|string',
            'flavor' => 'required|string',
            'granule' => 'nullable',
            'appearance' => 'nullable',
            'packaging' => 'required|string',
            'taste' => 'required',
            'partical_size' => 'nullable',
            'screen_mm' => 'nullable',
            'filth_insect' => 'nullable',
        ];
    }


}
