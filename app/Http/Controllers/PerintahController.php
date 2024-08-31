<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Mesin;
use App\Models\shift;
use App\Models\Produk;
use App\Models\Perintah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PerintahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function alphabet_number($number)
    {
        $alphabet = ['', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L'];
        return $alphabet[$number];
    }

    public function no_batch($request)
    {
        $mesin = Mesin::find($request->mesin_id);
        $produk = Produk::find($request->produk_id);
        $batch_tahun = date('y', strtotime($request->tanggal_produksi));
        $batch_bulan = date('n', strtotime($request->tanggal_produksi));
        $month_alphabet = $this->alphabet_number($batch_bulan);
        $batch_tanggal = date('d', strtotime($request->tanggal_produksi));
        $batch_shift = $this->alphabet_number($request->shift_id);
        return $batch_tahun . $month_alphabet . $batch_tanggal .  $produk->kode_produk . '-' . $batch_shift . $mesin->no_mesin;
    }
    public function index()
    {

        $data['title'] = 'Daftar Perintah Produk Jadi';
        $data['perintahs'] = Perintah::orderBy('created_at', 'desc')
            ->limit(1) // Mengambil 10 data terbaru
            ->get();
        $data['shifts'] = shift::all();
        $data['mesins'] = Mesin::all();

        return view('admin.perintah.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Buat Perintah Produk Jadi';
        $data['produks'] = Produk::all();
        $data['shifts'] = shift::all();
        $data['mesins'] = Mesin::all();

        return view('admin.perintah.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            // $produk = Produk::findOrfail($request->produk_id);



            $validator = Validator::make($request->all(), [
                'produk_id' => ['required', 'numeric'],
                'mesin_id' => ['required', 'numeric'],
                'tanggal_produksi'  => ['required', 'date'],
                'tanggal_produksi_coa'  => ['nullable', 'date'],
                'shift_id'  => ['required', 'numeric'],
            ]);
            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            $produk = Produk::findOrFail($request->produk_id);
            $tanggal_produksi = Carbon::parse($request->tanggal_produksi);
            $tanggal_expired = $tanggal_produksi->copy()->addMonthsNoOverflow($produk->expired);

            // Cek apakah tanggal expired ada di kalender, jika tidak ada, setel ke tanggal sebelumnya
            if (!$tanggal_expired->isValid()) {
             $tanggal_expired->day = $tanggal_expired->daysInMonth;
                }

            $data['tanggal_expired'] = $tanggal_expired;
            $data['tanggal_expired_coa'] = Carbon::parse($request->tanggal_produksi_coa)->addMonths($produk->expired);
            $data['no_batch'] = $this->no_batch($request);
            $data['created_by'] = Auth::user()->name;
            $data['spec_id'] = $request->produk_id;
            $data['bobot'] = $produk->packaging ?? null;
            $data['appearance'] = $produk->appearance ?? null;
            $data['catatan'] = $produk->catatan ?? null;
            $data['komposisi'] = $produk->komposisi ?? null;
            $data['screen'] = $produk->screen ?? null;
            $data['packaging'] = $produk->plastic ?? null;

            $perintah = Perintah::create($data);

            DB::commit();

            return redirect()->route('perintah.index')->with('success', 'Berhasil Menyimpan data Pengujian');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Perintah $perintah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perintah $perintah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perintah $perintah)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perintah $perintah)
    {
        //
    }
}
