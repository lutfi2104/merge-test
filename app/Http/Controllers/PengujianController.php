<?php

namespace App\Http\Controllers;

use Throwable;
use App\Rules\Sak;
use Carbon\Carbon;
use App\Models\Coa;
use App\Models\Spec;
use App\Models\Mesin;
use App\Models\shift;
use App\Models\Produk;
use App\Models\Pengujian;
use App\Rules\PengujianRule;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PhpParser\Node\Stmt\TryCatch;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SpecController;
use Auth;
use Illuminate\Support\Facades\Validator;

class PengujianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Hanya mengizinkan akses untuk role tertentu untuk method store dan show
        $this->middleware('role:Super Admin|Admin QC|QC|Leader PRD|SCPI|Admin PRD|Spv PRD|Packing')->only('store', 'show');

        // Hanya mengizinkan akses untuk role Super Admin dan Admin QC untuk method edit, destroy, update, dan export
        $this->middleware('role:Super Admin|Admin QC')->only('edit', 'destroy', 'update', 'export');

        // Mengizinkan akses untuk role tertentu untuk method create
        $this->middleware('role:Super Admin|Admin QC|QC')->only('create');
    }
    public function export()
    {
        try {
            $pengujians = Pengujian::all();
            Log::info($pengujians);

            $export = new \App\Exports\PengujianExport;
            return $export->download('pengujian.xlsx');
        } catch (\Exception $e) {
            Log::error('Error exporting data: ' . $e->getMessage());
            return response()->json(['error' => 'Error exporting data.']);
        }
    }
    public function method_prd()
    {
        $method = ['Oven Rotary', 'Oven Electrobake', 'Extruder'];
        return $method;
    }
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
    public function no_batch_coa($request)
    {

        $produk = Produk::find($request->produk_id);
        $batch_tahun = date('y', strtotime($request->tanggal_produksi));
        $batch_bulan = date('n', strtotime($request->tanggal_produksi));
        $month_alphabet = $this->alphabet_number($batch_bulan);
        $batch_tanggal = date('d', strtotime($request->tanggal_produksi));

        return $batch_tahun . $month_alphabet . $batch_tanggal .  $produk->kode_produk;
    }
    public function bulan($request)
    {
        $bulan = date('F', strtotime($request->tanggal_produksi));
        return $bulan;
    }
    public function tahun($request)
    {
        $tahun = date('Y', strtotime($request->tanggal_produksi));
        return $tahun;
    }
    public function jumlah_sak($request)
    {
        // $jumlah = $request->sak_awal;
        if ($request->sak_akhir) {
            $range = range($request->sak_awal, $request->sak_akhir);
            foreach ($range as $key => $value) {
                $jumlah = $key + 1;
            }
        }
        return $jumlah;
    }
    public function index()
    {
        Carbon::setLocale('id');
        $data['title'] = 'Daftar Pengujian Produk Jadi';
        $data['pengujians'] = Pengujian::orderBy('created_at', 'desc')
            ->orderBy('tanggal_produksi', 'desc')
            ->get();
        $data['shifts'] = shift::all();
        $data['mesins'] = Mesin::all();

        return view('admin.pengujian.index', $data);
    }
    public function cetakcoa(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'cetak' => 'required|array'
            ]);
            if ($validator->fails()) {

                return redirect()->back()->with('erorr', 'Input Tidak Valid');
            }
            $coas = [];

            foreach ($request->cetak as $no_batch_coa) {
                $pengujian = Pengujian::firstWhere('no_batch_coa', $no_batch_coa);
                $coa = Coa::firstWhere('no_batch_coa', $no_batch_coa);
                array_push($coas, [
                    'pengujian' => $pengujian,
                    'coa' => $coa
                ]);
            }
            $data['title'] = 'Cetak Coa';
            $data['coas'] = $coas;

            return view('admin.pengujian.cetakcoa', $data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
        // dd($request->all());
        // tryCatch->validator->logging->
    }

    public function coa()
    {
        $data['title'] = 'Daftar Coa';
        $data['pengujians'] = Pengujian::all();
        $pengujianGroup = Pengujian::orderBy('tanggal_produksi', 'desc')->get()->groupBy('no_batch_coa');
        $average = Pengujian::createCoa($pengujianGroup);

        // dd($produk_name);
        // $a = [];
        // foreach ($pengujians as $index => $part) {
        //     dd($part);
        //     $produk_name = $part->first()->produk->name;
        //     $jml_data = $part->count();
        //     $a['id'] = $part->first()->id;
        //     $a['tanggal_produksi'] = $part->first()->tanggal_produksi;
        //     $a['tanggal_expired'] = $part->first()->tanggal_expired;
        //     // $a['no_batch'] = $part->first()->no_batch;
        //     $a['produk'][$index]['produk_name'] = $produk_name;
        //     $a['produk'][$index]['bulk_density'] = $part->sum('bulk_density') / $jml_data;
        //     $a['produk'][$index]['kadar_air'] = $part->sum('kadar_air') / $jml_data;
        //     $a['produk'][$index]['salinity'] = $part->sum('salinity') / $jml_data;
        //     $a['produk'][$index]['mesh_20'] = $part->sum('mesh_20') / $jml_data;
        //     $a['produk'][$index]['salmonella'] = $this->salmonella($part);
        //     $a['produk'][$index]['tpc'] = $this->firstOrNull($part, 'tpc');
        //     $a['produk'][$index]['entero'] = $this->firstOrNull($part, 'entero');
        //     $a['produk'][$index]['ym'] = $this->firstOrNull($part, 'ym');
        // }
        // dd($a);



        $data['average'] = $average;
        // dd($average);

        return view('admin.pengujian.coa', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Pengujian Produk jadi';
        $data['produks'] = Produk::all();
        $data['specs'] = Spec::all();
        $data['shifts'] = shift::all();
        $data['mesins'] = Mesin::all();
        $data['method_prds'] = $this->method_prd();

        return view('admin.pengujian.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $produk = Produk::findOrfail($request->produk_id);



            $validator = Validator::make($request->all(), [
                'produk_id' => ['required', 'numeric'],
                'mesin_id' => ['required', 'numeric'],
                'tanggal_produksi'  => ['required', 'date'],
                'tanggal_produksi_coa'  => ['nullable', 'date'],
                'shift_id'  => ['required', 'numeric'],
                'sak_awal'  => ['required', 'numeric', new Sak($request->sak_akhir)],
                'sak_akhir'  => ['nullable', 'numeric'],

                'catatan' => ['nullable', 'string'],
                'method_prd' => ['required', Rule::in($this->method_prd())],
                'visual' => ['required', Rule::in('Sesuai Speck')],
                'bulk_density' => ['nullable', 'numeric', new PengujianRule($produk->spec->bulk_density())],
                'salinity' => ['required', 'numeric', new PengujianRule($produk->spec->salinity)],
                'mesh_20' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_20)],
                'mesh_40' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_40)],
                'mesh_20_max' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_20_max)],
                'mesh_5_6' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_5_6)],
                'mesh_4' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_4)],
                'mesh_4_6' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_4_6)],
                'kadar_air' => ['required', 'numeric', new PengujianRule($produk->spec->kadar_air)],
                'mesh_1_4' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_1_4)],
                'mesh_1_4_5' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_1_4_5)],
                'mesh_6' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_6)],
                'mesh_6_10' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_6_10)],
                'mesh_30' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_30)],
                'mesh_40_kurang' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_40_kurang)],
                'salmonella' => ['nullable', 'string', new PengujianRule($produk->spec->salmonella)],
                'tpc' => ['nullable', 'string', new PengujianRule($produk->spec->tpc)],
                'entero' => ['nullable', 'string', new PengujianRule($produk->spec->entero)],
                'ym' => ['nullable', 'string', new PengujianRule($produk->spec->ym)],

            ]);
            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            $tanggal_produksi = Carbon::parse($request->tanggal_produksi);
            $tanggal_expired = $tanggal_produksi->copy()->addMonthsNoOverflow($produk->expired);

            // Cek apakah tanggal expired ada di kalender, jika tidak ada, setel ke tanggal sebelumnya
            if (!$tanggal_expired->isValid()) {
             $tanggal_expired->day = $tanggal_expired->daysInMonth;
                }


            $data['tanggal_expired'] = $tanggal_expired;
            $data['tanggal_expired_coa'] = Carbon::parse($request->tanggal_produksi_coa)->addMonths($produk->expired);
            $data['no_batch'] = $this->no_batch($request);
            $data['no_batch_coa'] = $this->no_batch_coa($request);
            $data['jumlah_sak'] = $this->jumlah_sak($request);
            $data['tahun'] = $this->tahun($request);
            $data['bulan'] = $this->bulan($request);
            $data['qc'] = Auth::user()->name;
            $data['jenis'] = $produk->jenis;
            $data['spec_id'] = $request->produk_id;



            // $data['tanggal_expired'] = Carbon::parse($request->tanggal_produksi)->subMonths($produk->expired);
            // untuk mencari tanggal produksi jika ada komplain

            // dd($data['jumlah_sak']);
            $pengujian = Pengujian::create($data);



            DB::commit();

            return redirect()->route('pengujian.index')->with('success', 'Berhasil Menyimpan data Pengujian');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pengujian $pengujian)
    {
        $data['title'] = 'Detail Data ';
        $data['pengujian'] = $pengujian;
        return view('admin.pengujian.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengujian $pengujian)
    {
        $data['title'] = 'Edit Pengujian Produk';
        $data['pengujian'] = $pengujian;
        $data['produks'] = Produk::all();
        $data['shifts'] = shift::all();
        $data['mesins'] = Mesin::all();
        $data['method_prds'] = $this->method_prd();
        return view('admin.pengujian.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengujian $pengujian)
    {
        try {
            DB::beginTransaction();
            $produk = Produk::findOrfail($request->produk_id);

            $validator = Validator::make($request->all(), [
                'produk_id' => ['required', 'numeric'],
                'mesin_id' => ['required', 'numeric'],
                'tanggal_produksi'  => ['required', 'date'],
                'tanggal_produksi_coa'  => ['nullable', 'date'],
                'shift_id'  => ['required', 'numeric'],
                'sak_awal'  => ['required', 'numeric', new Sak($request->sak_akhir)],
                'sak_akhir'  => ['required', 'numeric'],
                'catatan' => ['nullable', 'string'],
                'visual' => ['required', Rule::in('Sesuai Speck')],
                'method_prd' => ['required', Rule::in($this->method_prd())],
                'bulk_density' => ['nullable', 'numeric', new PengujianRule($produk->spec->bulk_density())],
                'salinity' => ['required', 'numeric', new PengujianRule($produk->spec->salinity)],
                'mesh_20' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_20)],
                'mesh_40' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_40)],
                'mesh_20_max' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_20_max)],
                'mesh_5_6' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_5_6)],
                'mesh_4' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_4)],
                'mesh_4_6' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_4_6)],
                'mesh_3' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_3)],
                'mesh_3_5' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_3_5)],
                'mesh_1_4' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_1_4)],
                'mesh_1_4_5' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_1_4_5)],
                'mesh_6' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_6)],
                'mesh_6_10' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_6_10)],
                'mesh_30' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_30)],
                'mesh_40_kurang' => ['nullable', 'string', new PengujianRule($produk->spec->mesh_40_kurang)],
                'kadar_air' => ['required', 'numeric', new PengujianRule($produk->spec->kadar_air)],
                'salmonella' => ['nullable', 'string', new PengujianRule($produk->spec->salmonella)],
                'tpc' => ['nullable', 'string', new PengujianRule($produk->spec->tpc)],
                'entero' => ['nullable', 'string', new PengujianRule($produk->spec->entero)],
                'ym' => ['nullable', 'string', new PengujianRule($produk->spec->ym)],

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

           $tanggal_produksi = Carbon::parse($request->tanggal_produksi);
            $tanggal_expired = $tanggal_produksi->copy()->addMonthsNoOverflow($produk->expired);

            // Cek apakah tanggal expired ada di kalender, jika tidak ada, setel ke tanggal sebelumnya
            if (!$tanggal_expired->isValid()) {
             $tanggal_expired->day = $tanggal_expired->daysInMonth;
                }


            $data['tanggal_expired'] = $tanggal_expired;
            $data['tanggal_expired_coa'] = Carbon::parse($request->tanggal_produksi_coa)->addMonths($produk->expired);
            $data['no_batch'] = $this->no_batch($request);
            $data['no_batch_coa'] = $this->no_batch_coa($request);
            $data['jumlah_sak'] = $this->jumlah_sak($request);
            $data['tahun'] = $this->tahun($request);
            $data['bulan'] = $this->bulan($request);
            $data['qc'] = $pengujian->qc;
            $data['jenis'] = $produk->jenis;
            $data['spec_id'] = $request->produk_id;

            $pengujian->update($data);

            DB::commit();

            return redirect()->route('pengujian.index')->with('success', 'Berhasil Menyimpan Data Uji Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah sihh');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengujian $pengujian)
    {
        try {
            DB::beginTransaction();
            $pengujian->delete();
            DB::commit();
            return redirect()->route('pengujian.index')->with('success', 'Berhasil Menghapus Data');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('PengujianController::destroy() ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
}
