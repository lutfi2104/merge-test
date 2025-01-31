<?php

namespace App\Http\Controllers;

use App\Models\Temuan;
use Illuminate\Http\Request;

class TemuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['title'] = 'Daftar Temuan';
        $data['temuans'] = Temuan::all();
        return view('admin.temuan.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Temuan $temuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Temuan $temuan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Temuan $temuan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Temuan $temuan)
    {
        //
    }
}
