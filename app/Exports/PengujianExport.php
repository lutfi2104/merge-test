<?php

namespace App\Exports;

use App\Models\Pengujian;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class PengujianExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
{
    use Exportable;
    /**
     * @return \Illuminate\Support\Collection
     */
    public function query()
    {
        return Pengujian::query();
    }
    public function map($pengujian): array
    {
        Log::info($pengujian);
        static $counter = 0;
        $counter++;
        return [
            $counter,
            $pengujian->produk->name,
            $pengujian->jenis,
            $pengujian->bulan,
            $pengujian->tahun,
            $pengujian->qc,
            $pengujian->tanggal_produksi,
            $pengujian->tanggal_expired,
            $pengujian->shift->shift,
            $pengujian->mesin->nama_mesin,
            $pengujian->sak_awal,
            $pengujian->sak_akhir,
            $pengujian->jumlah_sak,
            $pengujian->no_batch,
            $pengujian->no_batch_coa,
            $pengujian->bulk_density,
            $pengujian->salinity,
            $pengujian->kadar_air,
            $pengujian->visual,
            $pengujian->mesh_20,
            $pengujian->mesh_40,
            $pengujian->mesh_1_4,
            $pengujian->mesh_1_4_5,
            $pengujian->mesh_4,
            $pengujian->mesh_4_6,
            $pengujian->mesh_6,
            $pengujian->mesh_6_10,
            $pengujian->mesh_20_max,
            $pengujian->mesh_40_min,
            $pengujian->salmonella,
            $pengujian->entero,
            $pengujian->ym,
            $pengujian->tpc,


        ];
    }

    public function headings(): array
    {
        return [
            'NO',
            'NAMA PRODUK',
            'Jenis',
            'Bulan',
            'Tahun',
            'QC',
            'TANGGAL PRODUKSI',
            'TANGGAL EXPIRED',
            'SHIFT',
            'NAMA MESIN',
            'SAK_AWAL',
            'SAK_AKHIR',
            'JUMLAH SAK',
            'NO BATCH PRODUK',
            'NO BATCH COA',
            'BULK DENSITY',
            'SALINITY',
            'KADAR AIR',
            'ORGANOLAPTIK',
            'MESH 20',
            'MESH 40',
            'MESH 1/4',
            'MESH 1/4 - 5',
            'MESH 4',
            'MESH 4 - 6',
            'MESH 6',
            'MESH 6 - 10',
            'MESH 20 MAX (MFD)',
            'MESH 40 MIN (MFD)',
            'SALMONELLA',
            'ENTERO',
            'YM',
            'TPC',

        ];
    }

    public function styles(Worksheet $sheet)
    {
        $lastRow = $sheet->getHighestDataRow();
        $lastColumn = $sheet->getHighestDataColumn();

        $styleArray = [
            // Style the first row (headings)
            1 => [
                'font' => ['bold' => true],
                'fill' => [
                    'fillType' => Fill::FILL_SOLID,
                    'startColor' => ['rgb' => 'd3d3d3'],
                ],
            ],
            // Style the range of cells with data
            'A1:' . $lastColumn . $lastRow => [
                'alignment' => [
                    'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                ],
                // 'borders' => [
                //     'outline' => [
                //         'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                //     ],
                // ],
            ],
        ];

        // Autofilter for the entire data range
        $sheet->setAutoFilter('A1:' . $lastColumn . $lastRow);

        // Conditional formatting for alternating row colors
        $conditionalFormat = new Conditional();
        $conditionalFormat->setConditionType(Conditional::CONDITION_EXPRESSION)
            ->setOperatorType(Conditional::OPERATOR_LESSTHAN)
            ->addCondition('MOD(ROW(),2) = 0')
            ->getStyle()
            ->getFill()
            ->setFillType(Fill::FILL_SOLID)
            ->getStartColor()
            ->setRGB('f2f2f2');

        $sheet->getStyle('A1:' . $lastColumn . $lastRow)->setConditionalStyles([$conditionalFormat]);

        return $styleArray;
    }


}
