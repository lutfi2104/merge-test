<?php

namespace App\Console\Commands;

use Log;

use Carbon\Carbon;
use App\Models\Ujirm;
use App\Models\Kalibrasi;
use App\Models\Pengujian;
use Illuminate\Console\Command;
use App\Services\GoogleSheetsService;

class ExportPengujiansToSheet extends Command
{
    protected $signature = 'export:pengujians';
    protected $description = 'Export pengujians data to Google Sheets';
    protected $googleSheetsService;

    public function __construct(GoogleSheetsService $googleSheetsService)
    {
        parent::__construct();
        $this->googleSheetsService = $googleSheetsService;
    }

    public function handle()
    {
        $pengujianSpreadsheetId = '1k3BDgrFKKOMyBMonq1S4l1RUZiFFaC9WI1-vecXvhZ4'; // Ganti dengan ID spreadsheet Anda
        $pengujianRange = 'Pengujian_Produk!A2:AF'; // Ganti dengan pengujianRange yang sesuai
        // $ujiSpreadsheetId = '1k3BDgrFKKOMyBMonq1S4l1RUZiFFaC9WI1-vecXvhZ4'; // Ganti dengan ID spreadsheet Anda
        // $ujiRange = 'Uji_RM!A2:AF'; // Ganti dengan pengujianRange yang sesuai
        // $ujiProdukSpreadsheetId = '1k3BDgrFKKOMyBMonq1S4l1RUZiFFaC9WI1-vecXvhZ4'; // Ganti dengan ID spreadsheet Anda
        // $ujiProdukRange = 'Uji_Produk!A2:AF'; // Ganti dengan pengujianRange yang sesuai
        $kalibrasiSpreadsheetId = '1k3BDgrFKKOMyBMonq1S4l1RUZiFFaC9WI1-vecXvhZ4'; // ID spreadsheet untuk kalibrasi
        $kalibrasiRange = 'Kalibrasi!A2:C'; // Range untuk kalibrasi
        $rmpmSpreadsheetId = '1k3BDgrFKKOMyBMonq1S4l1RUZiFFaC9WI1-vecXvhZ4'; // ID spreadsheet untuk Ujirm
        $rmpmRange = 'Pengujian_RMPM!A2:AF'; // Range untuk Ujirm

        $pengujians = Pengujian::orderBy('tanggal_produksi', 'desc')
            ->orderByRaw("FIELD(shift_id, '3', '2', '1')")
            ->get();
        $values = $pengujians->map(function ($pengujian) {
            return [
                $pengujian->tanggal_produksi,
                $pengujian->bulan,
                $pengujian->tahun,
                $pengujian->no_batch,
                $pengujian->no_batch_coa,
                $pengujian->shift_id,
                $pengujian->mesin->nama_mesin,
                $pengujian->qc,
                $pengujian->tanggal_expired,
                $pengujian->jenis,
                $pengujian->method_prd ? $pengujian->method_prd : '',
                $pengujian->produk->name,
                isset($pengujian->bulk_density) ? floatval($pengujian->bulk_density) : '',
                isset($pengujian->salinity) ? floatval($pengujian->salinity) : '',
                isset($pengujian->kadar_air) ? floatval($pengujian->kadar_air) : '',
                $pengujian->visual,
                isset($pengujian->mesh_20) ? floatval($pengujian->mesh_20) : '',
                isset($pengujian->mesh_40) ? floatval($pengujian->mesh_40) : '',
                isset($pengujian->mesh_4) ? floatval($pengujian->mesh_4) : '',
                isset($pengujian->mesh_4_6) ? floatval($pengujian->mesh_4_6) : '',
                isset($pengujian->mesh_1_4) ? floatval($pengujian->mesh_1_4) : '',
                isset($pengujian->mesh_1_4_5) ? floatval($pengujian->mesh_1_4_5) : '',
                isset($pengujian->mesh_6) ? floatval($pengujian->mesh_6) : '',
                isset($pengujian->mesh_6_10) ? floatval($pengujian->mesh_6_10) : '',
                isset($pengujian->mesh_5_6) ? floatval($pengujian->mesh_5_6) : '',
                isset($pengujian->tpc) ? floatval($pengujian->tpc) : '',
                isset($pengujian->salmonella) ? floatval($pengujian->salmonella) : '',
                isset($pengujian->ym) ? floatval($pengujian->ym) : '',
                isset($pengujian->entero) ? floatval($pengujian->entero) : '',
                $pengujian->catatan ? $pengujian->catatan : '',
                'Halal & Passed',
                $pengujian->created_at ? Carbon::parse($pengujian->created_at)->format('d-m-Y H:i:s') : '',
            ];
        })->toArray();

        // // \Log::info('Pengujian Values: ', $values);

        $this->googleSheetsService->writeSheet($pengujianSpreadsheetId, $pengujianRange, $values);

        $kalibrasis = Kalibrasi::orderBy('created_at', 'desc')->get();
        $kalibrasiValues = $kalibrasis->map(function ($kalibrasi) {
            return [
                $kalibrasi->nama_alat ? $kalibrasi->nama_alat : '',
                $kalibrasi->merk ? $kalibrasi->merk : '',
                $kalibrasi->type ? $kalibrasi->type : '',
            ];
        })->toArray();

        // \Log::info('Kalibrasi Values: ', $kalibrasiValues);

        $this->googleSheetsService->writeSheet($kalibrasiSpreadsheetId, $kalibrasiRange, $kalibrasiValues);

        $ujirms = Ujirm::orderBy('tgl_datang', 'desc')->get();
        $ujirmValues = $ujirms->map(function ($ujirm) {
            return [
                $ujirm->tgl_datang,
                $ujirm->start_smp ? $ujirm->start_smp : '',
                $ujirm->end_smp ? $ujirm->end_smp : '',
                $ujirm->date_smp ? $ujirm->date_smp : '',
                $ujirm->user_name,
                $ujirm->nama_produk_supplier->nama_produk,
                $ujirm->supplier_id,
                $ujirm->no_batch,
                $ujirm->halal,
                $ujirm->bersih,
                $ujirm->kondisi,
                $ujirm->aroma,
                $ujirm->bentuk,
                $ujirm->warna,
                $ujirm->rasa ? $ujirm->rasa : '',
                $ujirm->suhu ? floatval($ujirm->suhu) : '',
                $ujirm->sample ? floatval($ujirm->sample) : '',
                $ujirm->asing ? $ujirm->asing : '',
                $ujirm->sebutkan ? $ujirm->sebutkan : '',
                $ujirm->qty,
                $ujirm->note ? $ujirm->note : '',
                $ujirm->comp_doc ? $ujirm->comp_doc : '',
                $ujirm->coa ? $ujirm->coa : '',
                $ujirm->ash ? floatval($ujirm->ash) : '',
                $ujirm->wet_gluten ? floatval($ujirm->wet_gluten) : '',
                $ujirm->protein ? floatval($ujirm->protein) : '',
                $ujirm->f_number ? floatval($ujirm->f_number) : '',
                $ujirm->lab ? $ujirm->lab : '',
                $ujirm->ka_beras ? floatval($ujirm->ka_beras) : '',
                $ujirm->ka_beras_qc ? floatval($ujirm->ka_beras_qc) : '',
                $ujirm->status,
                $ujirm->created_at ? Carbon::parse($ujirm->created_at)->format('d-m-Y H:i:s') : '',
            ];
        })->toArray();

        // // \Log::info('Ujirm Values: ', $ujirmValues);

        $this->googleSheetsService->writeSheet($rmpmSpreadsheetId, $rmpmRange, $ujirmValues);

        // $ujirms = Ujirm::orderBy('tgl_datang', 'desc')->get();
        // $ujirmValues = $ujirms->map(function ($ujirm) {
        //     return [
        //         $ujirm->tgl_datang,
        //         $ujirm->start_smp ? $ujirm->start_smp : '',
        //         $ujirm->end_smp ? $ujirm->end_smp : '',
        //         $ujirm->date_smp ? $ujirm->date_smp : '',
        //         $ujirm->user_name,
        //         $ujirm->nama_produk_supplier->nama_produk,
        //         $ujirm->supplier_id,
        //         $ujirm->no_batch,
        //         $ujirm->halal,
        //         $ujirm->bersih,
        //         $ujirm->kondisi,
        //         $ujirm->aroma,
        //         $ujirm->bentuk,
        //         $ujirm->warna,
        //         $ujirm->rasa ? $ujirm->rasa : '',
        //         $ujirm->suhu ? floatval($ujirm->suhu) : '',
        //         $ujirm->sample ? floatval($ujirm->sample) : '',
        //         $ujirm->asing ? $ujirm->asing : '',
        //         $ujirm->sebutkan ? $ujirm->sebutkan : '',
        //         $ujirm->qty,
        //         $ujirm->note ? $ujirm->note : '',
        //         $ujirm->comp_doc ? $ujirm->comp_doc : '',
        //         $ujirm->coa ? $ujirm->coa : '',
        //         $ujirm->ash ? floatval($ujirm->ash) : '',
        //         $ujirm->wet_gluten ? floatval($ujirm->wet_gluten) : '',
        //         $ujirm->protein ? floatval($ujirm->protein) : '',
        //         $ujirm->f_number ? floatval($ujirm->f_number) : '',
        //         $ujirm->lab ? $ujirm->lab : '',
        //         $ujirm->ka_beras ? floatval($ujirm->ka_beras) : '',
        //         $ujirm->ka_beras_qc ? floatval($ujirm->ka_beras_qc) : '',
        //         $ujirm->status,
        //         $ujirm->created_at ? Carbon::parse($ujirm->created_at)->format('d-m-Y H:i:s') : '',
        //     ];
        // })->toArray();

        // // \Log::info('Pengujian Values: ', $values);

        // $this->googleSheetsService->writeSheet($ujiSpreadsheetId, $ujiRange,  $ujirmValues);

        // $pengujians = Pengujian::orderBy('tanggal_produksi', 'desc')
        //     ->orderByRaw("FIELD(shift_id, '3', '2', '1')")
        //     ->get();
        // $valuesProduk = $pengujians->map(function ($pengujian) {
        //     return [
        //         $pengujian->tanggal_produksi,
        //         $pengujian->bulan,
        //         $pengujian->tahun,
        //         $pengujian->no_batch,
        //         $pengujian->no_batch_coa,
        //         $pengujian->shift_id,
        //         $pengujian->mesin->nama_mesin,
        //         $pengujian->qc,
        //         $pengujian->tanggal_expired,
        //         $pengujian->jenis,
        //         $pengujian->method_prd ? $pengujian->method_prd : '',
        //         $pengujian->produk->name,
        //         isset($pengujian->bulk_density) ? floatval($pengujian->bulk_density) : '',
        //         isset($pengujian->salinity) ? floatval($pengujian->salinity) : '',
        //         isset($pengujian->kadar_air) ? floatval($pengujian->kadar_air) : '',
        //         $pengujian->visual,
        //         isset($pengujian->mesh_20) ? floatval($pengujian->mesh_20) : '',
        //         isset($pengujian->mesh_40) ? floatval($pengujian->mesh_40) : '',
        //         isset($pengujian->mesh_4) ? floatval($pengujian->mesh_4) : '',
        //         isset($pengujian->mesh_4_6) ? floatval($pengujian->mesh_4_6) : '',
        //         isset($pengujian->mesh_1_4) ? floatval($pengujian->mesh_1_4) : '',
        //         isset($pengujian->mesh_1_4_5) ? floatval($pengujian->mesh_1_4_5) : '',
        //         isset($pengujian->mesh_6) ? floatval($pengujian->mesh_6) : '',
        //         isset($pengujian->mesh_6_10) ? floatval($pengujian->mesh_6_10) : '',
        //         isset($pengujian->mesh_5_6) ? floatval($pengujian->mesh_5_6) : '',
        //         isset($pengujian->tpc) ? floatval($pengujian->tpc) : '',
        //         isset($pengujian->salmonella) ? floatval($pengujian->salmonella) : '',
        //         isset($pengujian->ym) ? floatval($pengujian->ym) : '',
        //         isset($pengujian->entero) ? floatval($pengujian->entero) : '',
        //         $pengujian->catatan ? $pengujian->catatan : '',
        //         'Halal & Passed',
        //         $pengujian->created_at ? Carbon::parse($pengujian->created_at)->format('d-m-Y H:i:s') : '',
        //     ];
        // })->toArray();

        // // // \Log::info('Pengujian Values: ', $values);

        // $this->googleSheetsService->writeSheet($ujiProdukSpreadsheetId, $ujiProdukRange, $valuesProduk);

        $this->info('Data berhasil diekspor');
    }
}
