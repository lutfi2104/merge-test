<?php

namespace App\Http\Controllers;

use th;
use Throwable;
use Illuminate\Http\Request;
use App\Models\produkSupplier;
use App\Imports\JenisBahanImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class ProdukSupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:Super Admin|Admin QC',)->only('edit', 'destroy', 'update', 'show', 'store');
    }
    public function import(Request $request)
    {
        try {
            DB::beginTransaction();

            // Menambahkan dd untuk melihat apakah request dan file sesuai


            // Menambahkan log info untuk melihat pesan informasi di log
            Log::info('Data received in import request: ' . json_encode($request->all()));

            // Eksekusi import Excel
            Excel::import(new JenisBahanImport, $request->file('file'));

            DB::commit();
            return redirect('admin/produk_supplier')->with('success', 'Berhasil Menyimpan di Data Produk');
        } catch (Throwable $th) {
            DB::rollback();

            // Menambahkan dd untuk melihat pesan kesalahan
            dd($th->getMessage());

            // Menambahkan log error untuk mencatat pesan kesalahan
            Log::error('Error during import: ' . $th);

            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }

    public function index()
    {
        try {
            $data['produksuppliers'] = ProdukSupplier::all();
            $data['title'] = 'Jenis Bahan Baku';
            return view('admin.produksuppliers.index', $data);
        } catch (\Exception $e) {
            return redirect()->route('produksupplier.index')->with('error', $e->getMessage());
        }
    }

    public function create()
    {
        try {
            $data['title'] = 'Tambah Jenis Bahan Baku';
            return view('admin.produksuppliers.create', $data);
        } catch (\Exception $e) {
            return redirect()->route('produksupplier.create')->with('error', $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'jenis_produk' => ['required', 'string', 'unique:produk_suppliers,jenis_produk,'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            // Lakukan pengulangan hingga kode_prd yang unik ditemukan
            do {
                $kode_jenis = str_pad(mt_rand(0, 999), 3, '0', STR_PAD_LEFT);
            } while (ProdukSupplier::where('kode_jenis', $kode_jenis)->exists());

            $data['kode_jenis'] = $kode_jenis;

            ProdukSupplier::create($data);

            DB::commit();

            return redirect()->route('produk_supplier.index')->with('success', 'Berhasil Menyimpan Nama Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }


    public function show(ProdukSupplier $produksupplier)
    {
        try {
            return view('produksuppliers.show', compact('produksupplier'));
        } catch (\Exception $e) {
            return redirect()->route('produk_supplier.index')->with('error', $e->getMessage());
        }
    }

    public function edit(ProdukSupplier $produk_supplier)
    {
        try {
            $data['title'] = 'Edit Produk Supplier';
            $data['produksuppliers'] = $produk_supplier;
            return view('admin.produksuppliers.edit', $data);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function update(Request $request, ProdukSupplier $produk_supplier)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'jenis_produk' => 'required|string|unique:produk_suppliers,jenis_produk,' . $produk_supplier->id,
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $currentKodeJenis = \App\Models\produkSupplier::find($produk_supplier->id)->kode_jenis;
            $data = $validator->validated();
            $data['kode_jenis'] = $currentKodeJenis;
            $produk_supplier->update($data);
            DB::commit();

            return redirect()->route('produk_supplier.index')->with('success', 'Produk Supplier updated successfully');
        } catch (\Exception $e) {
            return redirect()->route('produk_supplier.edit', $produk_supplier->id)->with('error', $e->getMessage());
        }
    }

    public function destroy(ProdukSupplier $produk_supplier)
    {
        try {
            $produk_supplier->delete();

            return redirect()->route('produk_supplier.index')->with('success', 'Produk Supplier deleted successfully');
        } catch (\Exception $e) {
            return redirect()->route('produk_supplier.index')->with('error', $e->getMessage());
        }
    }
}
