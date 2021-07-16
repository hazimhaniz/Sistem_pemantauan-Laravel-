<?php

namespace App\Mail\Pegawai;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\OtherModel\Notification;

class KemaskiniProjek extends Mailable
{
    use SerializesModels;

    public $filing;
    public $template;
    public $subject;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($filing, $subject)
    {

        $notification = Notification::where('code', 'emel.agihan.tugasan')->first();

        $this->filing = $filing;
        $this->template = $notification->message;
        $this->subject = $subject;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // return $this->from(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'))
            // ->subject( $this->subject )
            // ->markdown('emails.pegawai.pengesahan_projek');
        return $this->markdown('emails.pegawai.kemaskini_projek')->subject( $this->subject )->replyTo(env('MAIL_FROM_ADDRESS'), env('MAIL_FROM_NAME'));
    }
}
