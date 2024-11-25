<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SuccessEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $register;
    protected $details;
    protected $qrcode;

    public function __construct($register,$details,$qrcode)
    {
        $this->register = $register;
        $this->details = $details;
        $this->qrcode = $qrcode;
    }


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data['register'] = $this->register;
        $data['details'] = $this->details;
        $data['qrcode'] = $this->qrcode;
        return $this->subject('Registrasi Visitor Telah Disetujui')
        ->view('email.success',$data);
    }
}
