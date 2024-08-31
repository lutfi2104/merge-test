<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Ujirm;
use App\Mail\DailyUjiRM;
use App\Mail\DailyDataReport;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Jobs\SendDataStoredNotification;

class SendEmailUjiRm extends Command
{
    protected $signature = 'report:daily';
    protected $description = 'Send daily report of Uji RMPM data';



    public function handle()
    {
        $today = Carbon::today()->toDateString();
        $data = Ujirm::whereDate('tgl_datang', $today)->get();

        if ($data->isNotEmpty()) {
            Mail::to(['tejawahyuilham01@gmail.com ', 'qaqcbcn1@gmail.com', 'maulanaerlangga24@gmail.com'])
                ->cc(['tejawahyuilham01@gmail.com ', 'qaqcbcn1@gmail.com', 'maulanaerlangga24@gmail.com'])
                ->send(new DailyUjiRM($data));
            $this->info('Daily report sent successfully.');
        } else {
            $this->info('No data to report for today.');
        }
    }
}
