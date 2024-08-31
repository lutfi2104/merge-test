<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use App\Models\Jenis_Inspeksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class JenisInspeksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Daftar Jenis Inspeksi';
        $data['jenis_inspeksis'] = Jenis_Inspeksi::all();
        return view('admin.jenis_inspeksi.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Jenis Inspeksi';
        return view('admin.jenis_inspeksi.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }
            $data = $validator->validated();
            Jenis_Inspeksi::create($data);
            DB::commit();
            return redirect()->route('jenis_inspeksi.index')->with('success', 'Jenis Inspeksi created successfully');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah sihh');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenis_Inspeksi $jenis_Inspeksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jenis_Inspeksi $jenis_inspeksi)
    {
        $data['title'] = 'Edit Jenis Inspeksi';
        $data['jenis_inspeksi'] = $jenis_inspeksi;
        return view('admin.jenis_inspeksi.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jenis_Inspeksi $jenis_inspeksi)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }
            $data = $validator->validated();
            $jenis_inspeksi->update($data);
            DB::commit();
            return redirect()->route('jenis_inspeksi.index')->with('success', 'Jenis Inspeksi created successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi masalah sihh');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenis_Inspeksi $jenis_inspeksi)
    {
        try {
            DB::beginTransaction();
            $jenis_inspeksi->delete();
            DB::commit();
            return redirect()->route('jenis_inspeksi.index')->with('success', 'Berhasil Menghapus Data');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
    }
    }
}
