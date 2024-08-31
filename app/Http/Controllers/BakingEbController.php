<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Produk;
use App\Models\Baking_eb;
use App\Models\NamaProduk;
use Illuminate\Http\Request;
use App\Exports\bakingExport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class BakingEbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function export()
    {
        // Menghitung tanggal 3 bulan yang lalu dari sekarang
        $threeMonthsAgo = Carbon::now()->subMonths(3)->format('Y-m-d');

        // Menyusun nama file dengan tanggal dan waktu saat ini
        $fileName = 'daftar_produk_baking' . Carbon::now()->format('l_d_F_Y-H_i') . '.xlsx';

        // Mengekspor data yang sesuai ke file Excel
        return (new bakingExport($threeMonthsAgo))->download($fileName);
    }
    public function index()
    {
        $data['title'] = 'Daftar Produk';
        $data['bakingEbs'] = Baking_eb::orderBy('created_at', 'desc')
        ->orderBy('tanggal', 'desc')
        ->get();
        return view('admin.baking_eb.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Uji';
        $data['namaproduks'] = NamaProduk::all();
        return view('admin.baking_eb.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'tanggal' => ['required', 'date'],
                'nama_produk_id' => ['required', 'numeric'],
                'no_batch' => ['required', 'numeric'],
                'no_mixer' => ['required', 'string'],
                'tambah_air' => ['required', 'numeric'],
                'mixing_in' => ['required', 'date_format:H:i'],
                'mixing_out' => ['required', 'date_format:H:i'],
                'proofing_in' => ['required', 'date_format:H:i'],
                'profing_out' => ['required', 'date_format:H:i'],
                'baking_in' => ['required', 'date_format:H:i'],
                'baking_out' => ['required', 'date_format:H:i'],
                'no_eb' => ['required', 'numeric'],
                'no_gerobak' => ['required', 'numeric'],
                'suhu_produk' => ['required', 'numeric'],
            ]);

            if ($validator->fails()) {
                $requestData = $request->all();
                Log::debug('Data yang dikirim:', $requestData);
                Log::debug('Error validation messages:', $validator->errors()->all()); // Menggunakan all() untuk mendapatkan pesan sebagai array
                return redirect()->back()->withErrors($validator->errors())->withInput($requestData);


            }

            $data = $validator->validated();
            $data['bulan'] = date('F', strtotime($request->tanggal));
            $data['tahun'] = date('Y', strtotime($request->tanggal));
            $data['op'] = auth()->user()->name;

            Log::debug('Data yang akan disimpan:', $data);


            Baking_eb::create($data);

            DB::commit();

            return redirect()->route('baking_eb.index')->with('success', 'Data berhasil disimpan');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Baking_eb $baking_eb)
    {
        $data['title'] = 'Detail Data Baking Eb';
        $data['baking_eb'] = $baking_eb;
        return view('admin.baking_eb.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Baking_eb $baking_eb)
    {
        $data['title'] = 'Edit Uji';
        $data['bakingEb'] = $baking_eb;
        $data['namaproduks'] = NamaProduk::all();
        return view('admin.baking_eb.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Baking_eb $baking_eb)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'tanggal' => ['required', 'date'],
                'nama_produk_id' => ['required', 'numeric'],
                'no_batch' => ['required', 'numeric'],
                'no_mixer' => ['required', 'string'],
                'tambah_air' => ['required', 'numeric'],
                'mixing_in' => ['required'],
                'mixing_out' => ['required'],
                'proofing_in' => ['required'],
                'profing_out' => ['required'],
                'baking_in' => ['required'],
                'baking_out' => ['required'],
                'no_eb' => ['required', 'numeric'],
                'no_gerobak' => ['required', 'numeric'],
                'suhu_produk' => ['required', 'numeric'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();
            $data['bulan'] = date('F', strtotime($request->tanggal));
            $data['tahun'] = date('Y', strtotime($request->tanggal));
            $data['op'] = $baking_eb->op;

            Baking_eb::create($data);

            DB::commit();

            return redirect()->route('baking_eb.index')->with('success', 'Data berhasil disimpan');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Baking_eb $baking_eb)
    {
        try {
            DB::beginTransaction();
            $baking_eb->delete();
            DB::commit();
            return redirect()->route('baking_eb.index')->with('success', 'Berhasil Menghapus Data');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('BakingEbController::destroy() ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
}
