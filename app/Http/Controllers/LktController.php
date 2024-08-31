<?php

namespace App\Http\Controllers;

use App\Models\Lkt;
use App\Models\User;
use App\Models\Lktcor;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LktController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function type_lkt()
     {
         $type = ['Internal', 'Eksternal'];
         return $type;
     }

     public function jenis()
     {
         $jenis = ['Customer Complaint', 'Supplier Complaint', ' GHMP', 'Audit Internal', 'Audit Eksternal', 'Inspeksi', 'Pest Control', 'Other'];
         return $jenis;
     }
    public function index()
    {
        $data['lkt'] = Lkt::all();
        $data['title'] = 'Daftar Laporan Ketidaksesuaiaan dan Tindakan Perbaikan';
        return view('admin.lkt.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Buat Laporan Ketidaksesuaiaan dan Tindakan Perbaikan';
        $data['type'] = $this->type_lkt();
        $data['jenis'] = $this->jenis();
        $data['dept'] = Departement::all();
        $data['users'] = User::all();
        return view('admin.lkt.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
         $validator = Validator::make($request->all(), [
             'nama_inisiator' => 'required',
             'departement' => 'required',
             'subject' => 'required',
             'nama_produk' => 'nullable',
             'tanggal' => 'required',
             'isi' => 'required',
             'halal' => 'required',
             'kode_produk' => 'nullable',
             'jumlah_produk' => 'nullable',
             'status' => 'nullable',
             'data_pelanggan' => 'nullable',
             'type_lkt' => ['required', Rule::in($this->type_lkt())],
            'jenis' => ['required', Rule::in($this->jenis())],

         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }
        $data = $validator->validated();
        $data['user_id'] = Auth::id();
        $data['departement_id'] = Auth::user()->departement_id;
        Lkt::create($data);
        DB::commit();
        return redirect()->route('lkt.index')->with('success', 'LKT created successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Lkt $lkt)
    {
        $data['lkt'] = $lkt;
        $data['lktcor'] = Lktcor::all();
        $data['lktcorExists'] = Lktcor::where('lkt_id', $lkt->id)->exists();
        $data['title'] = 'Daftar Laporan Ketidaksesuaiaan dan Tindakan Perbaikan';
        return view('admin.lkt.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Lkt $lkt)
    {
        $data['title'] = 'Edit Laporan Ketidaksesuaiaan dan Tindakan Perbaikan';
        $data['type'] = $this->type_lkt();
        $data['jenis'] = $this->jenis();
        $data['dept'] = Departement::all();
        $data['users'] = User::all();
        $data['lkt'] = $lkt;
        return view('admin.lkt.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lkt $lkt)
    {
        try {
            DB::beginTransaction();
         $validator = Validator::make($request->all(), [
             'nama_inisiator' => 'required',
             'departement' => 'required',
             'type_lkt' => 'required',
             'subject' => 'required',
             'jenis' => 'required',
             'nama_produk' => 'nullable',
             'tanggal' => 'required',
             'isi' => 'required',
             'halal' => 'required',
             'kode_produk' => 'nullable',
             'jumlah_produk' => 'nullable',
             'status' => 'nullable',
             'data_pelanggan' => 'nullable',
         ]);

         if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }
        $data = $validator->validated();
        $data['user_id'] = Auth::id();
        $data['departement_id'] = Auth::user()->departement_id;
        $lkt->update($data);
        DB::commit();
        return redirect()->route('lkt.index')->with('success', 'LKT created successfully.');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lkt $lkt)
    {
        try {
            $lkt->delete();
            return redirect()->route('lkt.index')
                ->with('success', 'LKT deleted successfully.');
        } catch (\Throwable $th) {
            Log::error('Error:', ['message' => $th->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }
}
