<?php

namespace App\Exports;

use App\Models\Produk;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ProdukExport implements FromQuery, WithMapping, WithHeadings, ShouldAutoSize
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
        return Produk::where('created_at', '>=', $this->startDate);
    }

    public function map($produk): array
    {
        static $counter = 0;
        $counter++;
        return [
            $counter,
            $produk->name,
            $produk->expired,
            $produk->template->name,
            // Date::dateTimeToExcel($produk->created_at),
        ];
    }
    public function headings(): array
    {
        return [
            'No',
            'Nama',
            'Expired',
            'Jenis Produk',
        ];
    }
}
