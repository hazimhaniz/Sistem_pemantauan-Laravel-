<?php

namespace App\Mail\Pengguna;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\OtherModel\Notification;

class PengesahanPenggunaPP extends Mailable
{
    use SerializesModels;

    public $filing;
    public $template;
    public $subject;
    // public $password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($filing, $subject)
    {
        $notification = Notification::where('code', 'pengesahanpengguna.pengguna.pp')->first();

        $this->filing = $filing;
        $this->template = $notification->message;
        $this->subject = $notification->name;
        //$this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->markdown('emails.pengguna.pengesahan_penggunapp')->subject( $this->subject )->replyTo(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    }
}
