<?php

namespace App\Imports;

use App\Models\Spec;
use App\Models\Produk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class SpecImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure
{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function bulk_density($data)
    {
        try {
            $arr = explode(' ', $data);
            $arr = [
                'min' => $arr[0],
                'max' => $arr[2],
            ];
            return json_encode($arr);
        } catch (\Throwable $th) {
            return null;
        }
    }
    public function extract_string($data)
    {
        try {
            $arr = explode(' ', $data);
            return $arr[1];
        } catch (\Throwable $th) {
            return null;
        }
    }
    public function data_modif($row)
    {
        $row['bulk_density'] = $this->bulk_density($row['bulk_density']);
        $row['mesh_20'] = $this->extract_string($row['mesh_20']);
        $row['mesh_40'] = $this->extract_string($row['mesh_40']);
        $row['mesh_4'] = $this->extract_string($row['mesh_4']);
        $row['mesh_4_6'] = $this->extract_string($row['mesh_4_6']);
        $row['mesh_20_max'] = $this->extract_string($row['mesh_20_max']);
        $row['mesh_40_min'] = $this->extract_string($row['mesh_40_min']);
        $row['mesh_1_4'] = $this->extract_string($row['mesh_1_4']);
        $row['mesh_1_4_5'] = $this->extract_string($row['mesh_1_4_5']);
        $row['mesh_6'] = $this->extract_string($row['mesh_6']);
        $row['mesh_6_10'] = $this->extract_string($row['mesh_6_10']);
        $row['kadar_air'] = $this->extract_string($row['kadar_air']);
        $row['salinity'] = $this->extract_string($row['salinity']);
        return $row;
    }

    public function model(array $row)
    {

        $produk = Produk::where('name', $row['produk_id'])->first();
        $produk_id = $produk ? $produk->id : null;




        // Jika produk ditemukan, gunakan id-nya, jika tidak, beri nilai null

        $row = $this->data_modif($row);
        return new Spec([
            'produk_id' =>  $produk_id,
            'bulk_density' => $row['bulk_density'],
            'salinity' => $row['salinity'],
            'mesh_20' => $row['mesh_20'],
            'mesh_40' => $row['mesh_40'],
            'mesh_4' => $row['mesh_4'],
            'mesh_4_6' => $row['mesh_4_6'],
            'mesh_20_max' => $row['mesh_20_max'],
            'mesh_40_min' => $row['mesh_40_min'],
            'mesh_1_4' => $row['mesh_1_4'],
            'mesh_1_4_5' => $row['mesh_1_4_5'],
            'mesh_6' => $row['mesh_6'],
            'mesh_6_10' => $row['mesh_6_10'],
            'kadar_air' => $row['kadar_air'],
            'salmonella' => $row['salmonella'],
            'tpc' => $row['tpc'],
            'entero' => $row['entero'],
            'ym' => $row['ym'],
        ]);
    }

    public function rules(): array
    {
        return [
            'produk_id' => 'required|unique:specs|string',
            'bulk_density' => 'nullable|string',
            'salinity' => 'required|string',
            'mesh_20' => 'nullable|string',
            'mesh_40' => 'nullable|string',
            'mesh_4' => 'nullable|string',
            'mesh_4_6' => 'nullable|string',
            'mesh_20_max' => 'nullable|string',
            'mesh_40_min' => 'nullable|string',
            'mesh_1_4' => 'nullable|string',
            'mesh_1_4_5' => 'nullable|string',
            'mesh_6' => 'nullable|string',
            'mesh_6_10' => 'nullable|string',
            'kadar_air' => 'required|string',
            'salmonella' => 'nullable|string',
            'tpc' => 'nullable|integer',
            'entero' => 'nullable|integer',
            'ym' => 'nullable|integer',
        ];
    }
}
