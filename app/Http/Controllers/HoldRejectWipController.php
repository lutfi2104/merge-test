<?php

namespace App\Http\Controllers;

use Throwable;
use Carbon\Carbon;
use App\Models\Mesin;
use App\Models\shift;
use App\Models\Produk;
use Illuminate\Http\Request;
use App\Models\Hold_reject_wip;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class HoldRejectWipController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        // Hanya mengizinkan akses untuk role tertentu untuk method store dan show
        $this->middleware('role:Super Admin|Admin QC|QC|Leader PRD|SCPI|Admin PRD|Spv PRD|Packing|BU|Technical Support')->only('store', 'show');

        // Hanya mengizinkan akses untuk role Super Admin dan Admin QC untuk method edit, destroy, dan update
        $this->middleware('role:Super Admin|Admin QC')->only('edit', 'destroy', 'update');

        // Mengizinkan akses untuk role Super Admin, Admin QC, dan QC untuk method create
        $this->middleware('role:Super Admin|Admin QC|QC')->only('create');
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

    public $status = ['hold', 'reject', 'wip'];
    public function index()
    {
        $data['title'] = 'List Hold Reject Wip';
        $data['hold_reject_wip'] = Hold_reject_wip::all();
        $data['mesins'] = Mesin::all();
        $data['shifts'] = shift::all();
        return view('admin.holdRejectWips.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['produks'] = Produk::all();
        $data['mesins'] = Mesin::all();
        $data['shifts'] = shift::all();
        $data['title'] = 'Create Hold Reject Wip';
        $data['status'] = $this->status;

        return view('admin.holdRejectWips.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $produk = Produk::findOrfail($request->produk_id);
        $validator = Validator::make($request->all(), [
            'produk_id' => 'required|exists:produks,id',
            'mesin_id' => 'required|exists:mesins,id',
            'tanggal_produksi' => 'required|date',
            'shift_id' => 'required|exists:shifts,id',
            'jumlah' => 'required|numeric',
            'status' => 'required|string',
            'alasan' => 'required|string',
            'rekomendasi' => 'nullable|string',
        ]);

        if ($validator->fails()) {

            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }
        $data = $validator->validated();

        $data['tanggal_expired'] = Carbon::parse($request->tanggal_produksi)->addMonths($produk->expired);
        $data['kode_batch'] = $this->no_batch($request);
        // Simpan data ke dalam tabel hold_reject_wips
        Hold_reject_wip::create($data);

        return redirect()->route('hold_reject_wip.index')->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hold_reject_wip $hold_reject_wip)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hold_reject_wip $hold_reject_wip)
    {
        $data['produks'] = Produk::all();
        $data['mesins'] = Mesin::all();
        $data['shifts'] = shift::all();
        $data['title'] = 'Update Hold Reject Wip';
        $data['status'] = $this->status;
        $data['hold_reject_wip'] = $hold_reject_wip;

        return view('admin.holdRejectWips.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hold_reject_wip $hold_reject_wip)
    {
        $produk = Produk::findOrFail($request->produk_id);

        $validator = Validator::make($request->all(), [
            'produk_id' => 'required|exists:produks,id',
            'mesin_id' => 'required|exists:mesins,id',
            'tanggal_produksi' => 'required|date',
            'shift_id' => 'required|exists:shifts,id',
            'jumlah' => 'required|numeric',
            'status' => 'required|string',
            'alasan' => 'required|string',
            'rekomendasi' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }

        $data = $validator->validated();

        $data['tanggal_expired'] = Carbon::parse($request->tanggal_produksi)->addMonths($produk->expired);
        $data['kode_batch'] = $this->no_batch($request);
        // Gunakan metode update pada model
        $hold_reject_wip->update($data);

        return redirect()->route('hold_reject_wip.index')->with('success', 'Data berhasil disimpan.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hold_reject_wip $hold_reject_wip)
    {
        try {
            DB::beginTransaction();
            $hold_reject_wip->delete();
            DB::commit();
            return redirect()->route('hold_reject_wip.index')->with('success', 'Berhasil Menghapus Data');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('HoldRejectWipController::destroy() ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
}
