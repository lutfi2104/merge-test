<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use App\Models\Etiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Illuminate\Validation\Rule;

class EtiketController extends Controller
{
    /**
     * Display a listing of the resource.
     */


    public function prioritas()
    {
        $prioritas = ['High', 'Medium', 'Low'];
        return $prioritas;
    }

    public function jenis()
    {
        $jenis = ['Revisi', 'Akses User', 'Other'];
        return $jenis;
    }

    public function status()
    {
        $status = ['Open', 'Close'];
        return $status;
    }


    public function index()
    {
        $data['title'] = 'Support';
        if (Auth::user()->hasRole(['Super Admin', 'Admin', 'Admin QC'])) {
            // Jika iya, tampilkan semua data
            $data['etiket'] = Etiket::all();
        } else {
            $data['etiket'] = Etiket::where('nama', Auth::user()->name)->get();
        }
        return view('admin.etiket.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Data ';
        $data['status'] = $this->status();
        $data['prioritas'] = $this->prioritas();
        $data['dept'] = Departement::all();
        $data['jenis'] = $this->jenis();
        return view('admin.etiket.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'departement_id' => ['required'],
                'prioritas' => ['required', Rule::in($this->prioritas())],
                'jenis_bantuan' => ['required', 'string', Rule::in($this->jenis())],
                'nama' => ['required', 'string'],
                'subject' => ['required', 'string'],
                'content' => ['required', 'string'],
                // 'status' => ['required', Rule::in(['Open', 'Close',])],
            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $validator->validated();
            $data['status'] = $request->input('status', 'Open');
            $data['user_id'] = Auth::id();

            Log::info('Data yang akan disimpan:', $data);
            Etiket::create($data);
            DB::commit();

            return redirect()->route('etiket.index')->with('success', 'Etiket created successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Etiket $etiket)
    {
        $data['title'] = 'Detail Data ';
        $data['etiket'] = $etiket;
        return view('admin.etiket.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etiket $etiket)
    {
        $data['title'] = 'Edit Data ';
        $data['etiket'] = $etiket;
        $data['status'] = $this->status();
        $data['prioritas'] = $this->prioritas();
        $data['dept'] = Departement::all();
        $data['jenis'] = $this->jenis();
        return view('admin.etiket.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Etiket $etiket)
    {

        DB::beginTransaction();

        $validator = Validator::make($request->all(), [
            'departement_id' => ['required'],
            'prioritas' => ['required', Rule::in($this->prioritas())],
            'status' => ['required'],
            'jenis_bantuan' => ['required', 'string', Rule::in($this->jenis())],
            'subject' => ['required', 'string'],
            'content' => ['required', 'string'],
            'status' => ['nullable'],
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors())->withInput($request->all());
        }

        $currentUserID = $etiket->user_id;
        $currantNama = $etiket->nama;
        $data = $validator->validated();
        $data['user_id'] = $currentUserID;
        $data['nama'] = $currantNama;

        Log::info('Data yang akan diupdate:', $data);

        $etiket->update($data);

        DB::commit();

        return redirect()->route('etiket.index')->with('success', 'Etiket updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etiket $etiket)
    {
        $etiket->delete();
        return redirect()->route('etiket.index')->with('success', 'Etiket deleted successfully');
    }
}
