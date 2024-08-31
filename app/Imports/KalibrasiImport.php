<?php

namespace App\Imports;

use App\Models\Kalibrasi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Support\Facades\Storage;

class KalibrasiImport implements ToModel, WithHeadingRow, WithValidation, SkipsOnFailure

{
    use Importable, SkipsFailures;

    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        $fileContent = file_get_contents($row['sertifikat']); // Mendapatkan konten file

        // Mendapatkan ekstensi file dari nama file sertifikat
        $fileExtension = pathinfo($row['sertifikat'], PATHINFO_EXTENSION);

        // Menetapkan nama file baru dengan ekstensi yang diperoleh
        $fileName = $row['nama_alat'] . '_' . $row['merk'] . '.' . $fileExtension;

        // Menyimpan file ke direktori penyimpanan
        Storage::disk('public')->put('sertifikat_kalibrasi/' . $fileName, $fileContent);

        // Simpan path file ke dalam array data yang akan diimpor
        $row['sertifikat'] = $fileName;



        // Konversi nilai Excel ke format tanggal
        $tgl_kalibrasi_excel = (int) $row['tgl_kalibrasi'];
        $tgl_kalibrasi_timestamp = ($tgl_kalibrasi_excel - 25569) * 86400; // Konversi ke timestamp UNIX
        $tgl_kalibrasi_id = date('Y-m-d', $tgl_kalibrasi_timestamp); // Konversi ke format tanggal MySQL

        return new Kalibrasi([
            'nama_alat' => $row['nama_alat'],
            'merk' => $row['merk'],
            'type' => $row['type'],
            'nomor_seri' => $row['nomor_seri'],
            'rentang_ukur' => $row['rentang_ukur'],
            'resolusi' => $row['resolusi'],
            'verifikasi' => $row['verifikasi'],
            'kalibrasi' => $row['kalibrasi'],
            'kalibrator' => $row['kalibrator'],
            'tempat' => $row['tempat'],
            'tgl_kalibrasi' => $tgl_kalibrasi_id,
            'sertifikat' => $fileName, // Menggunakan nama file yang sudah ditentukan
        ]);
    }

    public function rules(): array
    {
        return [
            'nama_alat' => 'required|string',
            'merk' => 'nullable|string',
            'type' => 'nullable|string',
            'nomor_seri' => 'nullable',
            'rentang_ukur' => 'required',
            'resolusi' => 'required',
            'verifikasi' => 'nullable',
            'kalibrasi' => 'nullable',
            'kalibrator' => 'nullable',
            'tempat' => 'required',
            'tgl_kalibrasi' => 'required',
            'sertifikat' => 'nullable',




        ];
    }
}
