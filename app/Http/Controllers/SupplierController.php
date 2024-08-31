<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\supplier;
use Illuminate\Http\Request;
use App\Imports\ProdukImport;
use App\Imports\SupplierImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function import(Request $request)
     {
         try {
             DB::beginTransaction();
             Excel::import(new SupplierImport, request()->file('file'));
             DB::commit();
             return redirect('admin/supplier')->with('success', 'Berhasil Menyimpan di Data Produk');
         } catch (Throwable $th) {
             DB::rollback();
             Log::debug($th->getMessage());
             return redirect()->back()->with('error', 'Terjadi Masalah');
         }
     }
    public function index()
    {
        $data['title'] = 'Data Supplier';
        $data['suppliers'] = Supplier::all();
        return view('admin.supplier.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Data Supplier';
        return view('admin.supplier.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'nama_supplier' => 'nullable|string',
                'nama_produsen' => 'required|string|unique:suppliers,nama_produsen',
                'asal_produsen' => 'required|string',
                'asal_supplier' => 'nullable|string',
                'alamat1' => 'required|string',
                'alamat2' => 'nullable|string',
                'no_tlp' => 'nullable|string',
                'nama_pic' => 'required|string',
                'jabatan' => 'required|string',
                'email' => 'required|email',
                'no_hp' => 'required|string',
            ]);

            $supplier = Supplier::create($data);

            return redirect()->route('supplier.index')->with('success', 'Berhasil Menyimpan Kriteria');
        } catch (\Exception $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(supplier $supplier)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(supplier $supplier)
    {
        $data['title'] = 'Edit Data Supplier';
        $data['supplier'] = $supplier;
        return view('admin.supplier.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, supplier $supplier)
    {
        try {
            $supplier = Supplier::findOrFail($supplier->id);
            $data = $request->validate([
                'nama_supplier' => 'nullable|string',
                'nama_produsen' => 'required|string',
                'asal_produsen' => 'required|string',
                'asal_supplier' => 'nullable|string',
                'alamat1' => 'required|string',
                'alamat2' => 'nullable|string',
                'no_tlp' => 'nullable|string',
                'nama_pic' => 'required|string',
                'jabatan' => 'required|string',
                'email' => 'required|email',
                'no_hp' => 'required|string',
            ]);

            $supplier->update($data);

            return redirect()->route('supplier.index')->with('success', 'Berhasil Menyimpan Kriteria');
        } catch (\Exception $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(supplier $supplier)
    {
        try {
            DB::beginTransaction();
            $supplier->delete();
            DB::commit();
            return redirect()->route('supplier.index')->with('success', 'Berhasil Menghapus Data');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('supplierController::destroy() ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }

    }
}
