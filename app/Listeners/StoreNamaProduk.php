<?php

namespace App\Listeners;

use App\Models\NamaProduk;
use App\Events\ProdukCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreNamaProduk
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ProdukCreated $event): void
{
    $Produk = $event->Produk;

    // Menyimpan informasi produk ke dalam database nama_produks
    NamaProduk::updateOrCreate(
        ['kode_prd' => $Produk->kode_produk],
        ['nama_prd' => $Produk->name]
    );
}
}
