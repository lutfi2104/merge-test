<?php

namespace App\Http\Controllers;

use App\Models\Lkt;
use Throwable;
use App\Models\Lktcor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LktcorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function tambah(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $validator = Validator::make($request->all(), [
                'root_cause' => ['required', 'string'],
                'corrective_action' => ['required', 'string'],
                'preventive_action' => ['required', 'string'],
                'tanggal_isi' => ['required', 'date'],

                'due_date' => ['required', 'date'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $data = $validator->validated();


            $data['lkt_id'] = $id;
            $data['nama_pic'] = Auth::user()->name;
            // dd($data);
            Lktcor::create($data);
            DB::commit();
            return redirect('admin/lkt/' . $id)->with('success', 'Data berhasil disimpan & Jika akan di edit hubungi Admin');
        } catch (Throwable $th) {
            DB::rollback();
            Log::debug($th->getMessage());
            return redirect()->back()->with('error', 'Terjadi Kesalahan');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(Lktcor $lktcor)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $lkt_id)
    {
        $title = 'Edit Lktcor';

        $lktcor = Lktcor::find($lkt_id);
        $lkt = Lkt::find($lktcor->lkt_id);
        // $lkt = Lkt::find($id);
        return view('admin.lktcor.edit', compact('lktcor', 'lkt', 'title'));
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Lktcor $lktcor)
    {
        try {
            DB::beginTransaction();

            // Validasi input
            $validator = Validator::make($request->all(), [
                'root_cause' => ['required', 'string'],
                'corrective_action' => ['required', 'string'],
                'preventive_action' => ['required', 'string'],
                'tanggal_isi' => ['required', 'date'],
                'due_date' => ['required', 'date'],
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Data yang tervalidasi
            $data = $validator->validated();

            // Temukan Lkt yang sesuai
            $lkt = Lkt::find($lktcor->lkt_id);

            // Pastikan Lkt yang ditemukan tidak null
            if (!$lkt) {
                return redirect()->back()->with('error', 'Lkt tidak ditemukan');
            }

            // Atur atribut lkt_id dengan ID yang sesuai
            $data['lkt_id'] = $lkt->id;

            // Atur nama PIC
            $data['nama_pic'] = Auth::user()->name;

            // Update data
            $lktcor->update($data);

            DB::commit();

            return redirect()->route('lkt.show', $lkt->id)->with('success', 'Data Berhasil diupdate');
        } catch (\Throwable $th) {
            DB::rollBack();
            Log::error('Update Error: ', ['error' => $th->getMessage()]);
            return redirect()->back()->with('error', 'Terjadi kesalahan saat mengupdate data.');
        }
    }





    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Lktcor $lktcor)
    {
        //
    }
}
