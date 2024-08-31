<?php

namespace App\Http\Controllers;

use Exception;
use Throwable;
use App\Models\supplier;
use Illuminate\Http\Request;
use App\Models\produkSupplier;
use Illuminate\Support\Facades\DB;
use App\Models\namaProduk_supplier;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportNamaProdukSupplier;
use Illuminate\Support\Facades\Validator;

class NamaProdukSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('role:Super Admin|Admin QC|Purchasing|Rnd',)->only('edit', 'destroy', 'update', 'show', 'store');
    }
    public function get_nama_produk_json(Request $request)
    {
        try {
            $produk = namaProduk_supplier::findOrFail($request->nama_produk_id);
            return response()->json($produk, 200);
        } catch (Exception $e) {
            // Tangkap kesalahan dan log
            Log::error('Exception occurred: ' . $e->getMessage());

            return response()->json(['error' => 'Terjadi masalah saat pemrosesan.'], 500);
        }
    }
    public function import(Request $request)
    {
        try {

            DB::beginTransaction();
            Excel::import(new ImportNamaProdukSupplier, request()->file('file'));
            DB::commit();
            return redirect('admin/namaproduksuppliers')->with('success', 'Berhasil Mengimpor Data Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah saat Mengimpor Data');
        }
    }
    public function index()
    {
        $data['title'] = 'Daftar RMPM';
        $data['namaproduksuppliers'] = namaProduk_supplier::all();

        return view('admin.namaproduksuppliers.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Nama Bahan Baku';
        $data['suppliers'] = supplier::all();
        $data['produksuppliers'] = produkSupplier::all();
        return view('admin.namaproduksuppliers.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'supplier_id' => 'required|numeric',
                'produk_supplier_id' => 'required|numeric',
                'nama_produk' => 'required|string|unique:nama_produk_suppliers,nama_produk',
                'masa_halal' => 'nullable|date',
                'by_halal' => 'nullable|string',
                'satuan' => 'required|string',
                'kemasan' => 'required|string',
                'berat' => 'required|numeric',
                'kode' => 'required|string',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            namaProduk_supplier::create($data);

            DB::commit();

            return redirect()->route('namaproduksuppliers.index')->with('success', 'Berhasil Menyimpan di Keranjang');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::error('Exception occurred: ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(namaProduk_supplier $namaProduk_supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(namaProduk_supplier $namaproduksupplier)
    {
        try {
            $data['title'] = 'Edit Jenis Bahan Baku';
            $data['namaproduksupplier'] = $namaproduksupplier;
            return view('admin.namaproduksuppliers.edit', $data);
        } catch (\Throwable $th) {
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Temukan namaProduk_supplier berdasarkan ID
            $namaproduksupplier = namaProduk_supplier::findOrFail($id);

            $validator = Validator::make($request->all(), [
                'supplier_id' => 'required|numeric',
                'produk_supplier_id' => 'required|numeric',
                'nama_produk' => 'required|string|unique:nama_produk_suppliers,nama_produk,' . $namaproduksupplier->id,
                'satuan' => 'required|string',
                'masa_halal' => 'nullable|date',
                'by_halal' => 'nullable|string',
                'kemasan' => 'required|string',
                'berat' => 'required|numeric',
                'kode' => 'required|string',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            // Update data namaProduk_supplier
            $namaproduksupplier->update($data);

            DB::commit();

            return redirect()->route('namaproduksuppliers.index')->with('success', 'Berhasil Menyimpan Update Data');
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
            $namaProduk_supplier = namaProduk_supplier::findOrFail($id);
            // Tambahkan ini untuk debugging
            DB::beginTransaction();
            $namaProduk_supplier->delete();
            DB::commit();
            return redirect()->route('namaproduksuppliers.index');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }
}
