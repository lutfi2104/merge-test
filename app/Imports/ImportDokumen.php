<?php

namespace App\Imports;

use App\Models\Sop;
use App\Models\User;
use App\Models\Departement;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class ImportDokumen implements ToModel, WithHeadingRow, WithValidation
{
    use Importable;
    /**
     * @param Collection $collection
     */

    public function model(array $row)
    {
        $pic = User::where('name', $row['pic'])->first();

        // Jika produk ditemukan, gunakan id-nya, jika tidak, beri nilai null
        $pic_id = $pic ? $pic->id : null;

        $dept = Departement::where('departement', $row['dept'])->first();
        $dept_id = $dept ? $dept->id : null;


        if (!empty($row['tgl_efektif'])) {
            // Konversi nilai Excel ke format tanggal
            $tgl_efektif_excel = (int) $row['tgl_efektif'];
            $tgl_efektif_timestamp = ($tgl_efektif_excel - 25569) * 86400; // Konversi ke timestamp UNIX
            $tgl_efektif = date('Y-m-d', $tgl_efektif_timestamp); // Konversi ke format tanggal MySQL
        }

        $fileContent = file_get_contents($row['file']); // Mendapatkan konten file
        $fileExtension = pathinfo($row['file'], PATHINFO_EXTENSION);
        $fileName = $row['judul'] . '_' . $row['kode_dokumen'] . '.' . $fileExtension; // Menetapkan nama file baru

        // Menyimpan file ke direktori penyimpanan
        Storage::disk('public')->put('files/' . $fileName, $fileContent);

        // Simpan path file ke dalam array data yang akan diimpor
        $row['file'] = $fileName;



        return new Sop([
            'judul' => $row['judul'],
            'kode_dokumen' => $row['kode_dokumen'],
            'revisi' => $row['revisi'],
            'tgl_efektif' => $tgl_efektif,
            'pic' => $pic_id,
            'status' => $row['status'],
            'jenis' => $row['jenis'],
            'dept' => $dept_id,
            'rincian_revisi' => $row['rincian_revisi'],
            'file' => $row['file'],
        ]);
    }

    public function rules(): array
    {
        return [
            'judul' => 'required|string',
            'kode_dokumen' => 'required|string',
            'revisi' => 'required|string',
            'tgl_efektif' => 'required',
            'pic' => 'required',
            'status' => 'required|string',
            'jenis' => 'required|string',
            'dept' => 'required',
            'rincian_revisi' => 'nullable',
            'file' => 'nullable',

        ];
    }
}
