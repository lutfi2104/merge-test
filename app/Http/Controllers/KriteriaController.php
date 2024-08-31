<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use App\Imports\KriteriaImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;

class KriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('role:Super Admin|Admin QC',)->only('edit', 'destroy', 'update', 'show', 'store');
    }
    public function import(Request $request)
    {
        try {
            DB::beginTransaction();
            Excel::import(new KriteriaImport, request()->file('file'));
            DB::commit();

            return redirect('admin/kriteria')->with('success', 'Berhasil Menyimpan di Data Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
    public function index()
    {
        $data['title'] = 'Parameter Pengujian';
        $data['kriterias'] = Kriteria::all();
        return view('admin.kriteria.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Parameter';


        return view('admin.kriteria.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'unique:kriterias,name'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            do {
                // Generate kode acak antara 999 hingga 10000
                $data['kode'] = rand(999, 10000);
            } while (Kriteria::where('kode', $data['kode'])->exists());

            Kriteria::create($data);

            DB::commit();

            return redirect()->route('kriteria.index')->with('success', 'Berhasil Menyimpan Kriteria');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Kriteria $kriteria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kriteria = Kriteria::findOrFail($id);
        $data['title'] = 'Edit Parameter';
        $data['kriteria'] = $kriteria;
        return view('admin.kriteria.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        try {
            $kriteria = Kriteria::findOrFail($id);
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string', 'unique:kriterias,name,' . $kriteria->id],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();

            // Pastikan kode tidak berubah saat melakukan pembaruan
            $data['kode'] = $kriteria->kode;

            $kriteria->update($data);

            DB::commit();

            return redirect()->route('kriteria.index')->with('success', 'Berhasil Menyimpan Update Kriteria');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function hapus(Kriteria $kriteria)
    {
        try {
            Log::info('Trying to delete Kriteria. ID: ' . $kriteria->id);

            $kriteria->delete();

            Log::info('Kriteria deleted successfully. ID: ' . $kriteria->id);

            return redirect()->route('kriteria.index')->with('success', 'Kriteria berhasil dihapus.');
        } catch (\Exception $e) {
            Log::error('Error deleting kriteria. ID: ' . $kriteria->id . ', Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah saat menghapus kriteria.');
        }
    }

    public function destroy(Kriteria $kriteria)
    {
        //
    }
}
