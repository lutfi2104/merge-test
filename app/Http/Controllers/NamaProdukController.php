<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\NamaProduk;
use Illuminate\Http\Request;
use App\Imports\nama_produkImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class NamaProdukController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Super Admin|Admin QC',)->only('edit', 'destroy', 'update', 'show', 'store');
    }
    public function import(Request $request)
    {
        try {
            DB::beginTransaction();
            Excel::import(new nama_produkImport, request()->file('file'));
            DB::commit();

            return redirect('admin/nama_produk')->with('success', 'Berhasil Menyimpan di Data Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Daftar Produk';
        $data['nama_produks'] = NamaProduk::all();
        return view('admin.nama_produk.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Nama Produk';


        return view('admin.nama_produk.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'nama_prd' => ['required', 'string', 'unique:nama_produks,nama_prd,'],
                'kode_prd' => ['required', 'string', 'unique:nama_produks,kode_prd,'],

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            NamaProduk::create($data);

            DB::commit();

            return redirect()->route('nama_produk.index')->with('success', 'Berhasil Menyimpan Nama Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(NamaProduk $namaProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $data['title'] = 'Edit Nama Produk';
        $data['nama_produk'] = NamaProduk::findOrFail($id);
        return view('admin.nama_produk.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $nama_produk = NamaProduk::findOrFail($id);
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'nama_prd' => ['required', 'string', 'unique:nama_produks,nama_prd,' . $nama_produk->id],
                'kode_prd' => ['required', 'string', 'unique:nama_produks,kode_prd,' . $nama_produk->id],

            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            $nama_produk->update($data);

            DB::commit();

            return redirect()->route('nama_produk.index')->with('success', 'Berhasil Menyimpan Update Kriteria');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
            $nama_produk = NamaProduk::findOrFail($id);
            DB::beginTransaction();
            $nama_produk->delete();
            DB::commit();
            return redirect()->route('nama_produk.index')->with('success', 'Berhasil Menghapus Data');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('NamaProdukController::destroy()' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
}
