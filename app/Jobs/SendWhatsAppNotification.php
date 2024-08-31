<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Throwable;

class SendWhatsAppNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $target;
    protected $message;
    protected $token;
    protected $customDelay; // Ganti nama delay menjadi customDelay

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($target, $message, $token, $customDelay)
    {
        $this->target = $target;
        $this->message = $message;
        $this->$customDelay = $customDelay;
        $this->token = $token;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $curl = curl_init();

            curl_setopt_array($curl, [
                CURLOPT_URL => 'https://api.fonnte.com/send',
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => '',
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => 'POST',
                CURLOPT_POSTFIELDS => [
                    'target' => $this->target,
                    'message' => $this->message,
                    'delay' => $this->customDelay
                ],
                CURLOPT_HTTPHEADER => [
                    'Authorization: ' . $this->token,
                ],
            ]);

            $response = curl_exec($curl);
            curl_close($curl);

            Log::info("WhatsApp notification sent: {$this->message} to {$this->target}");
        } catch (Throwable $e) {
            Log::error('Failed to send WhatsApp notification:', ['error' => $e->getMessage()]);
        }
    }
}
