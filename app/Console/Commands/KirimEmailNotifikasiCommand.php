<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Kalibrasi;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendEmail;

class KirimEmailNotifikasiCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kirim-email-notifikasi-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    try {
        $kalibrasis = Kalibrasi::all();
        $dataToEmailUnder30Days = [];
        $dataToEmailUnder90Days = [];

        foreach ($kalibrasis as $item) {
            $tglKalibrasi = Carbon::parse($item->tgl_kalibrasi);
            $sekarang = Carbon::now();
            $selisihHari = $tglKalibrasi->diffInDays($sekarang);

            if ($selisihHari < 30) {
                // Jika kurang dari 30 hari, tambahkan ke $dataToEmailUnder30Days
                $dataToEmailUnder30Days[] = [
                    'namaPenerima' => 'Lutfi', // Ganti dengan nama penerima
                    'namaAlat' => $item->nama_alat,
                    'tglKalibrasiFormatted' => $tglKalibrasi->format('d-m-Y'),
                    'selisihHari' => $selisihHari
                ];
            } elseif ($selisihHari < 90) {
                // Jika kurang dari 90 hari, tambahkan ke $dataToEmailUnder90Days
                $dataToEmailUnder90Days[] = [
                    'namaPenerima' => 'Lutfi', // Ganti dengan nama penerima
                    'namaAlat' => $item->nama_alat,
                    'tglKalibrasiFormatted' => $tglKalibrasi->format('d-m-Y'),
                    'selisihHari' => $selisihHari
                ];
            } else {
                // Jika lebih dari 90 hari, lanjutkan ke iterasi berikutnya
                continue;
            }
        }

        // Kirim email untuk kondisi < 30 hari ke alamat email pertama
        Mail::to('lutfi.mla@gmail.com')->send(new SendEmail($dataToEmailUnder30Days));

        // Kirim email untuk kondisi < 90 hari ke alamat email kedua, jika ada data
        if (!empty($dataToEmailUnder90Days)) {
            Mail::to('qaqcbcn1@gmail.com')->send(new SendEmail($dataToEmailUnder90Days));
        }

        $this->info('Email notifikasi telah dikirim.');
    } catch (\Exception $e) {
        $this->error('Gagal mengirim email notifikasi. Pesan kesalahan: ' . $e->getMessage());
    }
}

}
