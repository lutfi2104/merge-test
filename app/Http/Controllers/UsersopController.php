<?php

namespace App\Http\Controllers;

use App\Models\Usersop;
use App\Models\Departement;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class UsersopController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Daftar User Dokumen';
        $data['usersops'] = Usersop::all();
        return view('admin.usersop.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['dept'] = Departement::all();
        $data['users'] = User::all();
        $data['title'] = 'Create User Dokumen';

        return view('admin.usersop.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
    	    'user_id' => 'required', 'unique:usersops,user_id',
            'departement_id' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                    ->withErrors($validator)
                    ->withInput();
            }
            $data = $validator->validated();
            Usersop::create($data);
            DB::commit();
            return redirect()->route('usersop.index')->with('success', 'Data Berhasil Disimpan');

        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Usersop $usersop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Usersop $usersop)
    {
        $data['dept'] = Departement::all();
        $data['users'] = User::all();
        $data['title'] = 'Edit User Dokumen';
        $data['usersop'] = $usersop;
        return view('usersop.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Usersop $usersop)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
            'user_id' => 'required',
            'departement_id' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
            DB::commit();

            return redirect()->route('usersop.index')->with('success', 'Data Berhasil Diupdate');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Usersop $usersop)
    {
        try {
            DB::beginTransaction();
            $usersop->delete();
            DB::commit();
            return redirect()->route('usersop.index')->with('success', 'Data Berhasil Dihapus');
        } catch (\Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
        }
    }
}
