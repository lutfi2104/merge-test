<?php

namespace App\Http\Controllers;

use App\Models\Departement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('role:Super Admin|Admin QC',)->only('edit', 'destroy', 'update', 'show', 'store');
    }
    public function index()
    {
        $data['title'] = 'Daftar Departement';
        $data['departements'] = Departement::all();
        return view('admin.departement.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['title'] = 'Create Departement';
        return view('admin.departement.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'departement' => ['required', 'string', 'max:255'],

            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $validator->validated();


            Log::info('Data yang akan disimpan:', $data);
            Departement::create($data);
            DB::commit();

            return redirect()->route('departement.index')->with('success', 'Etiket created successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Departement $departement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Departement $departement)
    {
        $data['title'] = 'Edit Departement';
        $data['departements'] = $departement;
        return view('admin.departement.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Departement $departement)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'departement' => ['required', 'string', 'max:255'],

            ]);

            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }

            $data = $validator->validated();


            Log::info('Data yang akan disimpan:', $data);
            $departement->update($data);
            DB::commit();

            return redirect()->route('departement.index')->with('success', 'Etiket created successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Departement $departement)
    {
        try {
            DB::beginTransaction();
            $departement->delete();
            DB::commit();
            return redirect()->route('departement.index')->with('success', 'Departement deleted successfully');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }
}
