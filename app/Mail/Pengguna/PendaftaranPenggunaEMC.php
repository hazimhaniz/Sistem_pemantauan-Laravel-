<?php

namespace App\Mail\Pengguna;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\OtherModel\Notification;

class PendaftaranPenggunaEMC extends Mailable
{
    use SerializesModels;

    public $template;
    public $subject;
    public $nama_projek;
    public $no_fail_jas;
    public $nama_emc;
    public $kad_pengenalan;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $notification = Notification::where('code', 'pendaftaran.pengguna_EMC')->first();

        $this->template = $notification->message;
        $this->subject  = $notification->name;
        $this->nama_emc       = $data['nama_emc'];
        $this->kad_pengenalan = $data['kad_pengenalan'];
        $this->nama_projek    = $data['projek'];
        $this->no_fail_jas    = $data['no_fail_jas'];
        $this->email          = $data['email'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         return $this->markdown('emails.pengguna.pendaftaran_penggunaemc')->subject( $this->subject )->replyTo(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    }
}
