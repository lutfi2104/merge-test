<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Produk;
use App\Models\NamaProduk;
use App\Models\bintikHitam;
use Illuminate\Http\Request;
use App\Exports\bintikExport;
use App\Jobs\DrumDrier;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\TimeDifferenceNotification;
use Illuminate\Support\Facades\Validator;

class BintikHitamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function export()
    {
        // Menghitung tanggal 3 bulan yang lalu dari sekarang
        $threeMonthsAgo = Carbon::now()->subMonths(3)->format('Y-m-d');

        // Menyusun nama file dengan tanggal dan waktu saat ini
        $fileName = 'daftar_produk_bintik' . Carbon::now()->format('l_d_F_Y-H_i') . '.xlsx';

        // Mengekspor data yang sesuai ke file Excel
        return (new bintikExport($threeMonthsAgo))->download($fileName);
    }
    public function index()
    {
        $data['title'] = 'Daftar Produk';
        $data['bintiks'] = bintikHitam::orderBy('created_at', 'desc')
            ->orderBy('tanggal', 'desc')
            ->get();
        return view('admin.bintik.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Uji';
        $data['namaproduks'] = NamaProduk::all();
        return view('admin.bintik.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $latestEntry = bintikHitam::latest()->first();


            $validator = Validator::make($request->all(), [
                'tanggal' => ['required', 'date'],
                'jam' => ['required', 'date_format:H:i'],
                'produk_id_1' => ['required', 'numeric'],
                'bintik_hitam_dd1' => ['nullable', 'string'],
                'dd1' => ['nullable', 'numeric'],
                'partikel_hitam_dd1' => ['nullable', 'string'],
                'benda_asing_dd1' => ['nullable', 'string'],
                'catatan_dd1' => ['nullable', 'string'],
                'gumpalan_dd1' => ['nullable', 'numeric'],

                'produk_id_2' => ['required', 'numeric'],
                'bintik_hitam_dd2' => ['nullable', 'string'],
                'dd2' => ['nullable', 'numeric'],
                'partikel_hitam_dd2' => ['nullable', 'string'],
                'benda_asing_dd2' => ['nullable', 'string'],
                'catatan_dd2' => ['nullable', 'string'],
                'gumpalan_dd2' => ['nullable', 'numeric'],

                'produk_id_3' => ['required', 'numeric'],
                'bintik_hitam_dd3' => ['nullable', 'string'],
                'dd3' => ['nullable', 'numeric'],
                'partikel_hitam_dd3' => ['nullable', 'string'],
                'benda_asing_dd3' => ['nullable', 'string'],
                'catatan_dd3' => ['nullable', 'string'],
                'gumpalan_dd3' => ['nullable', 'numeric'],

                'produk_id_4' => ['required', 'numeric'],
                'bintik_hitam_dd4' => ['nullable', 'string'],
                'dd4' => ['nullable', 'numeric'],
                'partikel_hitam_dd4' => ['nullable', 'string'],
                'benda_asing_dd4' => ['nullable', 'string'],
                'catatan_dd4' => ['nullable', 'string'],
                'gumpalan_dd4' => ['nullable', 'numeric'],
            ]);


            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();
            $data['bulan'] = date('F', strtotime($request->tanggal));
            $data['tahun'] = date('Y', strtotime($request->tanggal));
            $data['op'] = auth()->user()->name;

            if (is_numeric($data['produk_id_1']) && $data['produk_id_1'] === 111111) {
                $data['produk_id_1'] = 111111; // Ganti dengan ID yang sesuai (dalam kasus ini, 111111)
            }
            if (is_numeric($data['produk_id_1']) && $data['produk_id_1'] === 111111) {
                $data['produk_id_1'] = 111111; // Ganti dengan ID yang sesuai (dalam kasus ini, 111111)
            }
            if (is_numeric($data['produk_id_1']) && $data['produk_id_1'] === 111111) {
                $data['produk_id_1'] = 111111; // Ganti dengan ID yang sesuai (dalam kasus ini, 111111)
            }
            if (is_numeric($data['produk_id_1']) && $data['produk_id_1'] === 111111) {
                $data['produk_id_1'] = 111111; // Ganti dengan ID yang sesuai (dalam kasus ini, 111111)
            }

            bintikHitam::create($data);


            if ($latestEntry) {
                $latestTime = Carbon::parse($latestEntry->jam);
                $newTime = Carbon::createFromFormat('H:i', $request->jam);
                $timeDiff = $latestTime->diffInMinutes($newTime);

                $dds = new Collection([$request->dd1, $request->dd2, $request->dd3, $request->dd4]);

                if ($timeDiff > 90 || ($dds->min() ?? INF) < 80) {
                    $dd1 = $request->dd1;
                    $dd2 = $request->dd2;
                    $dd3 = $request->dd3;
                    $dd4 = $request->dd4;
                    // Dispatch job to send email
                    DrumDrier::dispatch($latestTime, $newTime, $dd1, $dd2, $dd3, $dd4, $timeDiff);
                }
            }


            DB::commit();

            return redirect()->route('bintik_hitam.index')->with('success', 'Berhasil Menyimpan di Keranjang');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(bintikHitam $bintikHitam)
    {
        $data['title'] = 'Detail Data Drum Drier';
        $data['bintiks'] = $bintikHitam;
        $data['produks'] = NamaProduk::all();
        return view('admin.bintik.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bintikHitam $bintikHitam)
    {
        $data['title'] = 'Edit Uji Produk';
        $data['bintikHitam'] = $bintikHitam;
        $data['produks'] = NamaProduk::all();
        return view('admin.bintik.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bintikHitam $bintikHitam)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'tanggal' => ['required', 'date'],
                'jam' => ['required'],
                'produk_id_1' => ['required', 'numeric'],
                'bintik_hitam_dd1' => ['nullable', 'string'],
                'dd1' => ['nullable', 'numeric'],
                'partikel_hitam_dd1' => ['nullable', 'string'],
                'benda_asing_dd1' => ['nullable', 'string'],
                'catatan_dd1' => ['nullable', 'string'],
                'gumpalan_dd1' => ['nullable', 'numeric'],

                'produk_id_2' => ['required', 'numeric'],
                'bintik_hitam_dd2' => ['nullable', 'string'],
                'dd2' => ['nullable', 'numeric'],
                'partikel_hitam_dd2' => ['nullable', 'string'],
                'benda_asing_dd2' => ['nullable', 'string'],
                'catatan_dd2' => ['nullable', 'string'],
                'gumpalan_dd2' => ['nullable', 'numeric'],

                'produk_id_3' => ['required', 'numeric'],
                'bintik_hitam_dd3' => ['nullable', 'string'],
                'dd3' => ['nullable', 'numeric'],
                'partikel_hitam_dd3' => ['nullable', 'string'],
                'benda_asing_dd3' => ['nullable', 'string'],
                'catatan_dd3' => ['nullable', 'string'],
                'gumpalan_dd3' => ['nullable', 'numeric'],

                'produk_id_4' => ['required', 'numeric'],
                'bintik_hitam_dd4' => ['nullable', 'string'],
                'dd4' => ['nullable', 'numeric'],
                'partikel_hitam_dd4' => ['nullable', 'string'],
                'benda_asing_dd4' => ['nullable', 'string'],
                'catatan_dd4' => ['nullable', 'string'],
                'gumpalan_dd4' => ['nullable', 'numeric'],

                // Add validation rules for other fields and other products
            ]);

            // Debugging: Log the validation errors
            if ($validator->fails()) {
                Log::debug('Validation errors:', $validator->errors()->all());
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();
            $data['bulan'] = date('F', strtotime($request->tanggal));
            $data['tahun'] = date('Y', strtotime($request->tanggal));
            $data['op'] = $bintikHitam->op;

            // Save the updated model
            $bintikHitam->update($data);

            DB::commit();

            return redirect()->route('bintik_hitam.index')->with('success', 'Berhasil Mengupdate Data');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bintikHitam $bintikHitam)
    {
        try {
            DB::beginTransaction();
            $bintikHitam->delete();
            DB::commit();
            return redirect()->route('bintik_hitam.index')->with('success', 'Berhasil Menghapus Data');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('BintikHitamController::destroy() ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
}
