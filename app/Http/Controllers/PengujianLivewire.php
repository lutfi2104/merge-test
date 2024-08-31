<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengujianLivewire extends Controller
{
    public function index()
    {

        $data['title'] = 'Daftar Pengujian Produk Jadi - LIVEWIRE';

        return view('admin.pengujian.index2', $data);
    }
}
