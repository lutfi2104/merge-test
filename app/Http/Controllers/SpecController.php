<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\Spec;
use App\Models\Produk;
use App\Imports\SpecImport;
use App\Rules\PengujianRule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;

class SpecController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Daftar Spec Produk';
        $data['specs'] = Spec::all();
        return view('admin.spec.index', $data);
    }



    public function import(Request $request)
    {
        try {

            DB::beginTransaction();
            Excel::import(new SpecImport, request()->file('file'));
            DB::commit();
            return redirect('admin/spec')->with('success', 'Berhasil Mengimpor Data Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah saat Mengimpor Data');
        }
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Tambah Spec Produk';
        $data['produks'] = Produk::all();
        return view('admin.spec.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // dd($request->bulk_density['max']);
            DB::beginTransaction();
            $bulk_density_min = 'nullable';
            $bulk_density_max = 'nullable';
            if ($request->bulk_density['min'] != null) {
                $bulk_density_max = 'required';
            }
            if ($request->bulk_density['max'] != null) {
                $bulk_density_min = 'required';
            }
            $validator = Validator::make($request->all(), [
                'produk_id' => ['required', 'numeric', 'unique:specs,produk_id'],
                'bulk_density.min' => [$bulk_density_min],
                'bulk_density.max' => [$bulk_density_max],
                'salinity' => ['required', 'numeric'],
                'mesh_20' => ['nullable', 'string'],
                'mesh_30' => ['nullable', 'string'],
                'mesh_20_max' => ['nullable', 'string'],
                'mesh_40' => ['nullable', 'string'],
                'mesh_40_kurang' => ['nullable', 'string'],
                'mesh_5_6' => ['nullable', 'string'],
                'mesh_4' => ['nullable', 'string'],
                'mesh_4_6' => ['nullable', 'string'],
                'mesh_1_4' => ['nullable', 'string'],
                'mesh_1_4_5' => ['nullable', 'string'],
                'mesh_6' => ['nullable', 'string'],
                'mesh_6_10' => ['nullable', 'string'],
                'kadar_air' => ['required', 'numeric'],
                'salmonella' => ['nullable', 'string'],
                'tpc' => ['nullable', 'string'],
                'entero' => ['nullable', 'string'],
                'ym' => ['nullable', 'string'],
            ]);


            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();
            $data['bulk_density'] = json_encode($request->bulk_density);
            if (!$request->bulk_density['min'] || !$request->bulk_density['max']) {
                $data['bulk_density'] = null;
            }
            Spec::create($data);

            DB::commit();

            return redirect()->route('spec.index')->with('success', 'Berhasil Menyimpan Spec Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Spec $spec)
    {
        $data['title'] = 'Detail Data ';
        $data['specs'] = $spec;
        return view('admin.spec.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spec $spec)
    {
        $data['title'] = 'Edit Spec Produk';
        $data['spec'] = $spec;
        $data['produks'] = Produk::all();
        return view('admin.spec.edit', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spec $spec)
    {
        try {

            DB::beginTransaction();

            $bulk_density_min = 'nullable';
            $bulk_density_max = 'nullable';
            if ($request->bulk_density['min'] != null) {
                $bulk_density_max = 'required';
            }
            if ($request->bulk_density['max'] != null) {
                $bulk_density_min = 'required';
            }
            $validator = Validator::make($request->all(), [
                'produk_id' => ['required', 'numeric', 'unique:specs,produk_id,' . $spec->id],
                'bulk_density.min' => [$bulk_density_min],
                'bulk_density.max' => [$bulk_density_max],
                'salinity' => ['required', 'numeric'],
                'mesh_20' => ['nullable', 'string'],
                'mesh_40' => ['nullable', 'string'],
                'mesh_30' => ['nullable', 'string'],
                'mesh_40_kurang' => ['nullable', 'string'],
                'mesh_20_max' => ['nullable', 'string'],
                'mesh_5_6' => ['nullable', 'string'],
                'mesh_4' => ['nullable', 'string'],
                'mesh_4_6' => ['nullable', 'string'],
                'mesh_1_4' => ['nullable', 'string'],
                'mesh_1_4_5' => ['nullable', 'string'],
                'mesh_6' => ['nullable', 'string'],
                'mesh_6_10' => ['nullable', 'string'],
                'kadar_air' => ['required', 'numeric'],
                'salmonella' => ['nullable', 'string'],
                'tpc' => ['nullable', 'string'],
                'entero' => ['nullable', 'string'],
                'ym' => ['nullable', 'string'],
            ]);


            if ($validator->fails()) {

                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }

            $data = $validator->validated();
            $data['bulk_density'] = json_encode($request->bulk_density);

            if (!$request->bulk_density['min'] || !$request->bulk_density['max']) {
                $data['bulk_density'] = null;
            }

            $spec->update($data);

            DB::commit();

            return redirect()->route('spec.index')->with('success', 'Berhasil Menyimpan Spec Produk');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spec $spec)
    {
        try {
            DB::beginTransaction();
            $spec->delete();
            DB::commit();
            return redirect()->route('spec.index')->with('success', 'Berhasil Menghapus Data');
        } catch (QueryException $e) {
            DB::rollback();
            if ($e->getCode() == '23000') { // SQLSTATE code for integrity constraint violation
                return redirect()->back()->with('error', 'Tidak dapat menghapus spesifikasi karena masih ada pengujian yang terkait.');
            }
            Log::debug('SpecController::destroy() ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah saat menghapus spesifikasi.');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('SpecController::destroy() ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah');
        }
    }
}
