<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Kalibrasi;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\View;

class SendWhatsappNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-whatsapp-notification';

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
        $kalibrasis = Kalibrasi::all();

        // Filter kalibrasi yang kurang dari 30 hari
        $filteredKalibrasis = $kalibrasis->filter(function ($kalibrasi) {
            $tglKalibrasi = Carbon::parse($kalibrasi->tgl_kalibrasi);
            $sekarang = Carbon::now();
            $selisihHari = $tglKalibrasi->diffInDays($sekarang);
            return $selisihHari < 30;
        });

        if ($filteredKalibrasis->isEmpty()) {
            $this->info("Tidak ada notifikasi yang perlu dikirim.");
            return;
        }

        // Buat pesan notifikasi menggunakan view Blade
        $pesan = View::make('admin.wa.whatsapp_notification', ['kalibrasis' => $filteredKalibrasis])->render();

        $token = 'cdtDVf2oj4Y@ENPH!VaS';
        $target = '120363306157073228@g.us';

        // Kirim notifikasi WhatsApp
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
                'target' => $target, // Nomor tujuan WhatsApp
                'message' => $pesan, // Pesan notifikasi teks
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token, // Ganti TOKEN dengan token Anda
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        // Tambahkan pesan notifikasi ke log
        $this->info("Notifikasi dikirim.");
    }
}
