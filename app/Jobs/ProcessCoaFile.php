<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use App\Models\namaProduk_supplier;
use App\Models\Ujirm;
use Carbon\Carbon;

class ProcessCoaFile implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;
    protected $filePath;
    protected $ujirmId;

    public function __construct(array $data, string $filePath, int $ujirmId)
    {
        $this->data = $data;
        $this->filePath = $filePath;
        $this->ujirmId = $ujirmId;
    }

    public function handle()
    {
        if ($this->filePath) {
            $ujirm = Ujirm::find($this->ujirmId);
            if (!$ujirm) {
                return;
            }

            $nama_produk_supplier_id = $this->data['nama_produk_supplier_id'];
            $no_batch = $this->data['no_batch'];
            $nama_produk = namaProduk_supplier::find($nama_produk_supplier_id)->nama_produk;
            $tgl_datang = Carbon::parse($this->data['tgl_datang'])->format('Ymd');
            $nama_file = "{$no_batch}_{$nama_produk}_{$tgl_datang}." . pathinfo($this->filePath, PATHINFO_EXTENSION);

            // Pindahkan file ke lokasi yang diinginkan dengan nama baru
            Storage::move($this->filePath, "coa/{$nama_file}");

            // Perbarui record Ujirm dengan nama file
            $ujirm->update(['coa' => $nama_file]);
        }
    }
}


