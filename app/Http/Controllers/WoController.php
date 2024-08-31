<?php

namespace App\Http\Controllers;

use App\Models\Wo;
use App\Models\Etiket;
use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class WoController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function jenis_bantuan()
    {
        $jenis = ['Repair', 'Project', 'Maintenance'];
        return $jenis;
    }

    public function status()
    {
        $status = ['Open', 'Close'];
        return $status;
    }

    public function prioritas()
    {
        $prioritas = ['High', 'Medium', 'Low'];
        return $prioritas;
    }
    public function index()
    {
        $data['title'] = 'WO Technical Support';
        $data['wos'] = Wo::all();
        return view('admin.wo.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create WO';
        $data['jenis'] = $this->jenis_bantuan();
        $data['status'] = $this->status();
        $data['prioritas'] = $this->prioritas();
        $data['dept'] = Departement::all();
        $data['etikets'] = Etiket::all();
        return view('admin.wo.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => ['required',],
                'subject' => ['required', 'string'],
                'departement_id' => ['required', 'numeric'],
                'prioritas' => ['required'],
                'jenis_bantuan' => ['required'],
                'content' => ['required'],
                'foto' => ['nullable', 'image', 'mimes:jpg,png,gif,webp', 'max:3000'],
                'due_date' => ['nullable'],
                'status' => ['nullable'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $validator->validated();
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $ext = $file->getClientOriginalExtension();
                $filename = time() . '.' . $ext;
                $path = $file->storeAs('foto_wo', $filename);
                $data['foto'] = $filename;
            }
            $data['user_id'] = Auth::id();
            Log::info('Data yang akan disimpan:', $data);
            Wo::create($data);
            DB::commit();
            return redirect()->route('wo.index')->with('success', 'Data Berhasil');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error, Terjadi Kesalahaan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Wo $wo)
    {
        $data['title'] = 'Detail Data ';
        $data['wo'] = $wo;
        return view('admin.wo.detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Wo $wo)
    {
        $data['title'] = 'Edit Data ';
        $data['wo'] = $wo;
        $data['jenis'] = $this->jenis_bantuan();
        $data['status'] = $this->status();
        $data['prioritas'] = $this->prioritas();
        $data['dept'] = Departement::all();
        $data['etikets'] = Etiket::all();
        return view('admin.wo.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Wo $wo)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'name' => ['required',],
                'subject' => ['required', 'string'],
                'departement_id' => ['required'],
                'prioritas_id' => ['required'],
                'jenis_bantuan' => ['required'],
                'content' => ['required'],
                'foto' => ['required'],
                'due_date' => ['nullable'],
                'status' => ['nullable'],
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $data = $validator->validated();
            $data['user_id'] = Auth::id();
            $wo->update($data);
            DB::commit();
            return redirect()->route('wo.index')->with('success', 'Data Berhasil');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error, Terjadi Kesalahan');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Wo $wo)
    {
        try {
            DB::beginTransaction();
            $wo->delete();
            DB::commit();
            return redirect()->route('wo.index')->with('success', 'Data Berhasil');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error, Terjadi Kesalahan');
        }
    }
}
