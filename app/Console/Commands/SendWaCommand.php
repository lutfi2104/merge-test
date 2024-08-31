<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Ujirm;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\View;

class SendWaCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-wa-command';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send WhatsApp notification';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $today = Carbon::today()->toDateString();
        $data = Ujirm::whereDate('tgl_datang', $today)->get();

        if ($data->isEmpty()) {
            $this->info("Tidak ada data untuk hari ini.");
            return;
        }

        // Buat pesan notifikasi menggunakan view Blade
        $pesan = View::make('admin.wa.rm', ['data' => $data])->render();

        $token = 'cdtDVf2oj4Y@ENPH!VaS'; // Ganti dengan token Anda
        $target = '120363306157073228@g.us'; // Ganti dengan nomor tujuan

        // Kirim notifikasi WhatsApp
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30, // Time out increased to 30 seconds
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => http_build_query([
                'target' => $target,
                'message' => $pesan,
            ]),
            CURLOPT_HTTPHEADER => array(
                'Authorization: ' . $token,
                'Content-Type: application/x-www-form-urlencoded',
            ),
        ));

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        if ($error) {
            $this->error("CURL Error: " . $error);
        } else {
            $this->info("Notifikasi dikirim: " . $response);
        }
    }
}
