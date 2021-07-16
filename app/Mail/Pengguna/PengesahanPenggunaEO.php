<?php

namespace App\Mail\Pengguna;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\OtherModel\Notification;

class PengesahanPenggunaEO extends Mailable
{
    use SerializesModels;

    public $filing;
    public $template;
    public $subject;
    public $password;
    public $peranan;
    public $no_fail_jas;
    public $nama_projek;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($filing, $subject, $password, $peranan,$no_fail_jas,$nama_projek)
    {
        $notification = Notification::where('code', 'pengesahanpenggunaeo.pengguna')->first();

        $this->filing = $filing;
        $this->template = $notification->message;
        $this->subject = $subject;
        $this->password = $password;
        $this->peranan = $peranan;
        $this->no_fail_jas = $no_fail_jas;
        $this->nama_projek = $nama_projek;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->markdown('emails.pengguna.pengesahan_pengguna')->subject( $this->subject )->replyTo(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    }
}
