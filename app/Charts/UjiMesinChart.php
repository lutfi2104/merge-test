<?php

namespace App\Charts;

use Carbon\Carbon;
use App\Models\Pengujian;
use Illuminate\Support\Facades\DB;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class UjiMesinChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build($jenis, $mesin, $range, $produkId)
    {
        // Mendapatkan data kadar air harian berdasarkan jenis produk, mesin, dan produk_id
        $query = Pengujian::whereHas('produk', function ($query) use ($jenis) {
            $query->where('jenis', $jenis);
        })
            ->selectRaw('DATE(created_at) as date, AVG(kadar_air) as average')
            ->where('created_at', '>=', Carbon::now()->subDays($range))
            ->groupBy('date')
            ->orderBy('date');

        if ($mesin != 0) {
            $query->where('mesin_id', $mesin);
        }

        if (!empty($produkId)) {
            $query->where('produk_id', $produkId);
        }

        $data = $query->get()
            ->mapWithKeys(function ($item) {
                $formattedDate = Carbon::parse($item->date)->format('d-m-Y');
                return [$formattedDate => number_format($item->average, 2)];
            })
            ->toArray();

        $dates = array_keys($data);
        $averages = array_values($data);

        return $this->chart->BarChart()
            ->setTitle('Rata-rata Kadar Air Harian (' . $range . ' Hari Terakhir) untuk ' . $jenis . ($mesin == 0 ? ' (Semua Mesin)' : ' dan Mesin ' . $mesin) . ($produkId ? ' dan Produk ID ' . $produkId : ''))
            ->addBar('Kadar Air', $averages)
            ->setXAxis($dates)
            ->setColors(['#ff6384', '#36a2eb', '#ffce56']) // Warna selang-seling
            ->setHeight(278)
            ->setDataLabels(true); // Menampilkan data labels di ujung bar
    }
}
