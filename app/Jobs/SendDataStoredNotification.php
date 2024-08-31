<?php

namespace App\Jobs;

use App\Mail\DataStoredNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use App\Models\Ujirm;

class SendDataStoredNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $ujirm;
    protected $ccRecipients;

    /**
     * Create a new job instance.
     *
     * @param Ujirm $ujirm
     * @param array $ccRecipients
     * @return void
     */
    public function __construct(Ujirm $ujirm, array $ccRecipients)
    {
        $this->ujirm = $ujirm;
        $this->ccRecipients = $ccRecipients;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $recipients = [
            'qaqcbcn1@gmail.com',
        ];

        Mail::to($recipients)
            ->cc($this->ccRecipients)
            ->send(new DataStoredNotification($this->ujirm));
    }
}

