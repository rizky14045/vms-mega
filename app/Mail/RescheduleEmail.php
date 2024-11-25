<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RescheduleEmail extends Mailable
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
    protected $visit;

    public function __construct($register,$details,$qrcode,$visit)
    {
        $this->register = $register;
        $this->details = $details;
        $this->qrcode = $qrcode;
        $this->visit = $visit;
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
        $data['visit'] = $this->visit;
        return $this->subject('Tanggal Visit Registrasi Visitor Telah Diubah')
        ->view('email.reschedule',$data);
    }
}
