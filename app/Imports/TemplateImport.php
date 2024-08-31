<?php

namespace App\Imports;

use App\Models\Kriteria;
use App\Models\Template;
use App\Imports\KriteriaImport;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class TemplateImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */


    public function model(array $row)
    {
        $kriteriaIds = explode('.', str_replace(',', '.', $row['kriteria_id'])); // Replace koma dengan titik dan kemudian pecah menjadi array
        return new Template([

            'name' => $row['name'],
            'kriteria_id' => json_encode($kriteriaIds)
        ]);
    }
    public function rules(): array
    {
        return [
            'name' => 'required|unique:templates,name',
            'kriteria_id' => 'required'
        ];
    }
}
