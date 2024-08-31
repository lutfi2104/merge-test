<?php

namespace App\Exports;

use App\Models\dd_ccpdry;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\Conditional;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class ccp_dryExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize, WithStyles
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
        return dd_ccpdry::where('created_at', '>=', $this->startDate);
    }

    public function map($ccp_dry): array
    {
        static $counter = 0;
        $counter++;
        return [
            $counter,
            date('d F Y', strtotime($ccp_dry->tanggal)),
            $ccp_dry->jam,
            $ccp_dry->dd1,
            $ccp_dry->dd2,
            $ccp_dry->dd3,
            $ccp_dry->dd4,
            $ccp_dry->catatan,
        ];
    }

    public function headings(): array
    {
        return [
            'NO',
            'Tanggal',
            'Jam',
            'Suhu DD 1 Celcius',
            'Suhu DD 2 Celcius',
            'Suhu DD 3 Celcius',
            'Suhu DD 4 Celcius',
            'catatan',
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
