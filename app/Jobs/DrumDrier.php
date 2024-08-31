<?php

namespace App\Jobs;

use App\Mail\TimeDifferenceNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail; // Import Mail dari namespace yang benar

class DrumDrier implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $latestTime;
    protected $newTime;
    protected $dd1;
    protected $dd2;
    protected $dd3;
    protected $dd4;
    protected $timeDiff; // Deklarasikan properti $timeDiff

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($latestTime, $newTime, $dd1, $dd2, $dd3, $dd4, $timeDiff)
{
    $this->latestTime = $latestTime;
    $this->newTime = $newTime;
    $this->dd1 = $dd1;
    $this->dd2 = $dd2;
    $this->dd3 = $dd3;
    $this->dd4 = $dd4;
    $this->timeDiff = $timeDiff; // Tambahkan variabel $timeDiff ke konstruktor
}

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
{
    Mail::to('lutfi.mla@gmail.com')->send(new TimeDifferenceNotification($this->latestTime, $this->newTime, $this->dd1, $this->dd2, $this->dd3, $this->dd4, $this->timeDiff));
}
}
