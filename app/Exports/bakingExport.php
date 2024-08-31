<?php

namespace App\Exports;

use App\Models\Baking_eb;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class bakingExport implements FromQuery, WithHeadings, ShouldAutoSize, WithStyles, WithMapping
{
    use Exportable;
    protected $startdata;
    public function __construct($startdata)
    {
        $this->startdata = $startdata;
    }

    public function query()
    {
        // Membuat query untuk mengambil data produk berdasarkan kriteria tanggal
        return Baking_eb::where('created_at', '>=', $this->startdata);
    }

    public function map($baking): array
    {
        return [
            $baking->tanggal,
            $baking->produk->nama_prd,
            $baking->no_batch,
            $baking->no_mixer,
            $baking->tambah_air,
            $baking->mixing_in,
            $baking->mixing_out,
            $baking->proofing_in,
            $baking->proofing_out,
            $baking->baking_in,
            $baking->baking_out,
            $baking->no_eb,
            $baking->no_gerobak,
            $baking->suhu_produk,
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Nama Produk',
            'No Bacth',
            'No Mixer',
            'Penambahan Air',
            'Mixing In',
            'Mixing Out',
            'Proofing in',
            'Proofing out',
            'Baking in',
            'Baking out',
            'No Eb',
            'No Gerobak',
            'Suhu Produk'
        ];


    }
    public function styles($worksheet)
    {
        return [
            'A1:Z1' => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }
}
