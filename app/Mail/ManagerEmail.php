<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ManagerEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    protected $register;
    protected $details;

    public function __construct($register,$details)
    {
        $this->register = $register;
        $this->details = $details;
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
        return $this->subject('Registrasi Visitor Baru')
        ->view('email.manager',$data);
    }
}
