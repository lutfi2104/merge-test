<?php

namespace App\Http\Controllers;

use Throwable;
use App\Models\dd_ccpdry;
use Illuminate\Http\Request;
use App\Exports\ccp_dryExport;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class DdCcpdryController extends Controller
{
    public function export()
{
    // Menghitung tanggal 3 bulan yang lalu dari sekarang
    $threeMonthsAgo = Carbon::now()->subMonths(3)->format('Y-m-d');

    // Menyusun nama file dengan tanggal dan waktu saat ini
    $fileName = 'daftar_produk_' . Carbon::now()->format('l_d_F_Y-H_i') . '.xlsx';

    // Mengekspor data yang sesuai ke file Excel
    return (new ccp_dryExport($threeMonthsAgo))->download($fileName);
}
    public function index()
    {
        $data['title'] = 'CCP 1 Dry';
        $data['page'] = 'CCP 1 Dry';
        $data['menu'] = 'index';
        $data['produks'] = dd_ccpdry::all();
        return view('admin.dd_ccpdry.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'CCP 1 Dry';
        $data['page'] = 'CCP 1 Dry';
        $data['menu'] = 'create';
        return view('admin.dd_ccpdry.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'tanggal' => ['required', 'date'],
                'jam' => ['required', 'date_format:H:i'],
                'dd1' => ['nullable', 'numeric'],
                'foto1' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:3000'],
                'dd2' => ['nullable', 'numeric'],
                'foto2' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:3000'],
                'dd3' => ['nullable', 'numeric'],
                'foto3' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:3000'],
                'dd4' => ['nullable', 'numeric'],
                'foto4' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:3000'],
                'catatan' => ['nullable', 'string'],

            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }
            $data = $validator->validated();
            if ($request->hasFile('foto1')) {
                $file = $request->file('foto1');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('dd1', $filename);
                $data['foto1'] = $filename;
            } else {
                // Set nilai default untuk kolom 'foto'
                $data['foto1'] = 'dd1/blank.jpg';
            }
            if ($request->hasFile('foto2')) {
                $file = $request->file('foto2');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('dd2', $filename);
                $data['foto2'] = $filename;
            } else {
                // Set nilai default untuk kolom 'foto'
                $data['foto2'] = 'dd2/blank.jpg';
            }
            if ($request->hasFile('foto3')) {
                $file = $request->file('foto3');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('dd3', $filename);
                $data['foto3'] = $filename;
            } else {
                // Set nilai default untuk kolom 'foto'
                $data['foto3'] = 'dd3/blank.jpg';
            }
            if ($request->hasFile('foto4')) {
                $file = $request->file('foto4');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('dd4', $filename);
                $data['foto4'] = $filename;
            } else {
                // Set nilai default untuk kolom 'foto'
                $data['foto4'] = 'dd4/blank.jpg';
            }
            Log::info('Data yang akan disimpan:', $data);
            dd_ccpdry::create($data);
            DB::commit();
            return redirect()->route('dd_ccpdry.index')->with('success', 'Berhasil Meniyimpan Data');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(dd_ccpdry $dd_ccpdry)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(dd_ccpdry $dd_ccpdry)
    {
        $data['title'] = 'Edit Data ';
        $data['page'] = 'Edit Data';
        $data['menu'] = 'edit';
        $data['produk'] = $dd_ccpdry;
        return view('admin.dd_ccpdry.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, dd_ccpdry $dd_ccpdry)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'tanggal' => ['required', 'date'],
                'jam' => ['required', 'date_format:H:i'],
                'dd1' => ['nullable', 'numeric'],
                'foto1' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:3000'],
                'dd2' => ['nullable', 'numeric'],
                'foto2' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:3000'],
                'dd3' => ['nullable', 'numeric'],
                'foto3' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:3000'],
                'dd4' => ['nullable', 'numeric'],
                'foto4' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:3000'],
                'catatan' => ['nullable', 'string'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
            }
            $data = $validator->validated();
            if ($request->hasFile('foto1')) {
                if ($dd_ccpdry->foto1 && Storage::exists($dd_ccpdry->foto1)) {
                    Storage::delete($dd_ccpdry->foto1);
                }
                $file = $request->file('foto1');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('dd1', $filename);
                $data['foto1'] = $path;
            } else {
                unset($data['foto1']);
            }
            if ($request->hasFile('foto2')) {
                if ($dd_ccpdry->foto2 && Storage::exists($dd_ccpdry->foto2)) {
                    Storage::delete($dd_ccpdry->foto2);
                }
                $file = $request->file('foto2');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('dd2', $filename);
                $data['foto2'] = $path;
            } else {
                unset($data['foto2']);
            }
            if ($request->hasFile('foto3')) {
                if ($dd_ccpdry->foto3 && Storage::exists($dd_ccpdry->foto3)) {
                    Storage::delete($dd_ccpdry->foto3);
                }
                $file = $request->file('foto3');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('dd3', $filename);
                $data['foto3'] = $path;
            } else {
                unset($data['foto3']);
            }
            if ($request->hasFile('foto4')) {
                if ($dd_ccpdry->foto4 && Storage::exists($dd_ccpdry->foto4)) {
                    Storage::delete($dd_ccpdry->foto4);
                }
                $file = $request->file('foto4');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('dd4', $filename);
                $data['foto4'] = $path;
            } else {
                unset($data['foto4']);
            }
            $dd_ccpdry->update($data);
            DB::commit();
            return redirect()->route('dd_ccpdry.index')->with('success', 'Berhasil Menyimpan Data');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(dd_ccpdry $dd_ccpdry)
    {
        try {
            DB::beginTransaction();
            $dd_ccpdry->delete();
            DB::commit();
            return redirect()->route('dd_ccpdry.index')->with('success', 'Berhasil Menghapus Data');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug('DdCcpdryController::destroy() ' . $th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Masalah');
        }
    }
}
