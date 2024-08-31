<?php

namespace App\Exports;

use App\Models\bintikHitam;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class bintikExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    use Exportable;
    protected $startDate;

    public function __construct($startDate)
    {
        $this->startDate = $startDate;
    }

    public function query()
    {
        // Membuat query untuk mengambil data produk berdasarkan kriteria tanggal
        return bintikHitam::where('created_at', '>=', $this->startDate);
    }

    public function map($bintikHitam): array
    {
        return [
            $bintikHitam->tanggal,
            $bintikHitam->jam,
            $bintikHitam->produk1->nama_prd,
            $bintikHitam->dd1,
            $bintikHitam->bintik_hitam_dd1,
            $bintikHitam->partikel_hitam_dd1,
            $bintikHitam->benda_asing_dd1,
            $bintikHitam->catatan_dd1,
            $bintikHitam->produk2->nama_prd,
            $bintikHitam->dd2,
            $bintikHitam->bintik_hitam_dd2,
            $bintikHitam->partikel_hitam_dd2,
            $bintikHitam->benda_asing_dd2,
            $bintikHitam->catatan_dd2,
            $bintikHitam->produk3->nama_prd,
            $bintikHitam->dd3,
            $bintikHitam->bintik_hitam_dd3,
            $bintikHitam->partikel_hitam_dd3,
            $bintikHitam->benda_asing_dd3,
            $bintikHitam->catatan_dd3,
            $bintikHitam->produk4->nama_prd,
            $bintikHitam->dd4,
            $bintikHitam->bintik_hitam_dd4,
            $bintikHitam->partikel_hitam_dd4,
            $bintikHitam->benda_asing_dd4,
            $bintikHitam->catatan_dd4,
        ];
    }

    public function headings(): array
    {
        return [
            'Tanggal',
            'Jam',
            'Nama Produk DD1',
            'Suhu DD1',
            'Bintik Hitam DD1',
            'Partikel Hitam DD1',
            'Benda Asing DD1',
            'Catatan DD1',
            'Nama Produk DD2',
            'Suhu DD2',
            'Bintik Hitam DD2',
            'Partikel Hitam DD2',
            'Benda Asing DD2',
            'Catatan DD2',
            'Nama Produk DD3',
            'Suhu DD3',
            'Bintik Hitam DD3',
            'Partikel Hitam DD3',
            'Benda Asing DD3',
            'Catatan DD3',
            'Nama Produk DD4',
            'Suhu DD4',
            'Bintik Hitam DD4',
            'Partikel Hitam DD4',
            'Benda Asing DD4',
            'Catatan DD4',
        ];
    }

    public function styles($worksheet)
    {
        return [
            'A1:I1' => [
                'alignment' => [
                    'horizontal' => Alignment::HORIZONTAL_CENTER,
                ],
            ],
        ];
    }
}
