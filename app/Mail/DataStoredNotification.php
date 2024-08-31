<?php

namespace App\Mail;

use App\Models\Ujirm;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DataStoredNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $ujirm;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Ujirm $ujirm)
    {
        $this->ujirm = $ujirm->load('nama_produk_supplier');
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.email.datastored')
                    ->subject('Kedatangan Bahan baku baru')
                    ->with('ujirm', $this->ujirm);
    }
}
