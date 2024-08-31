<?php

namespace App\Livewire;

use App\Models\Mesin;
use App\Models\shift;
use Livewire\Component;
use App\Models\Pengujian;
use Illuminate\Support\Carbon;

class PengujianIndex extends Component
{
    public $pengujians;
    public $shifts;
    public $mesins;

    public function mount()
    {
        Carbon::setLocale('id');
        $this->pengujians = Pengujian::orderBy('created_at', 'desc')
            ->orderBy('tanggal_produksi', 'desc')
            ->get();
        $this->shifts = shift::all();
        $this->mesins = Mesin::all();
        $title = 'Pengujian Produk Jadi';
    }

    public function render()
    {
        return view('livewire.pengujian-index');
    }
}
