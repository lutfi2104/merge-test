<?php

namespace App\Livewire\Produk;

use Livewire\Component;

class Pengujian extends Component
{
    public $title;
    public function render()
    {
        $title = 'Pengujian Produk Jadi - Livewire';
        return view('livewire.produk.pengujian')->layout('layouts.livewire-app', [
            'title' => $title
        ]);
    }
}
