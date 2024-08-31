<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Pengujian;
use Illuminate\Http\Request;
use App\Charts\UjiMesinChart;

class AdminController extends Controller
{
    // Metode untuk mendapatkan data jenis
    public function jenis()
    {
        return ['Dry Breadcrumbs', 'Fresh Breadcrumbs', 'Bubble Crumbs'];
    }

    // Metode untuk mendapatkan data mesin
    public function mesin()
    {
        return [
            0 => 'Semua Mesin',
            1 => 'DD1',
            2 => 'DD2',
            3 => 'DD3',
            4 => 'DD4',
            5 => 'Consumer',
            6 => 'Fresh BreadCrumbs 1',
            7 => 'Extruder 1',
            8 => 'Extruder 2',
            9 => 'Fresh BreadCrumbs 2',
            10 => 'Extruder 3'
        ];
    }

    // Metode untuk mendapatkan produk ID unik
    public function produkIds()
    {
        $produkIds = Produk::whereIn('id', Pengujian::pluck('produk_id')->unique())
            ->pluck('name', 'id'); // Mengambil name dan id produk

        // Menambahkan opsi "Tampilkan Semua" dengan ID kosong
        // $produkIds->prepend('Tampilkan Semua', '');

        return $produkIds;
    }

    // Metode untuk mendapatkan rentang waktu
    public function ranges()
    {
        return [7, 10, 15, 30, 60];
    }

    // Metode untuk menampilkan dashboard
    public function dashboard(Request $request, UjiMesinChart $ujiMesinChart)
    {
        $selectedJenis = $request->input('jenis', 'Dry Breadcrumbs'); // Default to 'Dry Breadcrumbs'
        $selectedMesin = $request->input('mesin', 0); // Default to 'Semua Mesin'
        $selectedRange = $request->input('range', 50); // Default to 50 days
        $selectedProdukId = $request->input('produk_id', ''); // Default to empty

        // Get unique produk_id for dropdown
        $produkIds = $this->produkIds();

        // Get ranges for dropdown
        $ranges = $this->ranges();

        // Build chart with selected options
        $chart = $ujiMesinChart->build($selectedJenis, $selectedMesin, $selectedRange, $selectedProdukId);

        $data = [
            'title' => 'Dashboard',
            'page' => 'dashboard',
            'jenis' => $this->jenis(),
            'mesin' => $this->mesin(),
            'produkIds' => $produkIds,
            'ranges' => $ranges,
            'selectedJenis' => $selectedJenis,
            'selectedMesin' => $selectedMesin,
            'selectedRange' => $selectedRange,
            'selectedProdukId' => $selectedProdukId,
            'chart' => $chart
        ];

        return view('admin.dashboard', $data);
    }
}
