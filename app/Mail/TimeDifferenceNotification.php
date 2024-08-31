<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Carbon\Carbon;

class TimeDifferenceNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $latestTime;
    public $newTime;
    public $dd1;
    public $dd2;
    public $dd3;
    public $dd4;
    public $timeDiff;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Carbon $latestTime, Carbon $newTime, $dd1, $dd2, $dd3, $dd4, $timeDiff)
    {
        $this->latestTime = $latestTime;
        $this->newTime = $newTime;
        $this->dd1 = $dd1;
        $this->dd2 = $dd2;
        $this->dd3 = $dd3;
        $this->dd4 = $dd4;
        $this->timeDiff = $timeDiff;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Suhu DD < 80 C Atau data > 90 Menit')
                    ->view('admin.email.bintikwaktu');
    }
}
