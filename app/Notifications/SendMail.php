<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\OtherModel\Notification as NotificationModel;
use Illuminate\Support\HtmlString;
use Exception;

class SendMail extends Notification implements ShouldQueue
{
    use Queueable;

    public $notification;
    public $substitution;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notificationId, $substitution = array())
    {
        $notification = NotificationModel::where('id', $notificationId)
            ->where('is_active_emel', 1)->first();

        $this->substitution = $substitution;

        if (!$notification) {
            throw new Exception('Emel Tidak Aktif');
        }

        $this->notification = $notification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $message = '';

        if ($this->notification->code == 'pengesahanpengguna.pengguna') {
            $message = str_replace('[nama]', $notifiable->name, $this->notification->message);
            $message = str_replace('[email]', $notifiable->email, $message);
            $message = str_replace('[peranan]', $notifiable->role_name_by_id(), $message);
            $message = str_replace('[nama_projek]', $notifiable->project_has_user->projek->nama_projek, $message);
            $message = str_replace('[no_fail_jas]', $notifiable->project_has_user->projek->no_fail_jas, $message);
            $message = str_replace('[id]', $notifiable->username, $message);
            $message = str_replace('[kata_laluan]', $this->substitution['password'] ?? '', $message);
        } else if ($this->notification->code == 'emel.tetapkan.semula.katalaluan') {
            $message = str_replace('%reset_password_link%', route('reset.password.token', $this->substitution['token']), $this->notification->message);
        } else if ($this->notification->code == 'emel.pendaftaran.projek') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
        } else if ($this->notification->code == 'emel.agihan.tugasan') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%nama%', $this->substitution['nama'], $message);
            $message = str_replace('%peranan%', $this->substitution['peranan'], $message);
        } else if ($this->notification->code == 'emel.pendaftaran.pengguna.pp') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%emel%', $this->substitution['emel'], $message);
            $message = str_replace('%nama%', $this->substitution['name'], $message);
            $message = str_replace('%username%', $this->substitution['username'], $message);
            $message = str_replace('%password%', $this->substitution['password'], $message);
            $message = str_replace('%peranan%', $this->substitution['peranan'], $message);
        } else if ($this->notification->code == 'emel.pendaftaran.pengguna.eo') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%emel%', $this->substitution['emel'], $message);
            $message = str_replace('%nama%', $this->substitution['name'], $message);
            $message = str_replace('%username%', $this->substitution['username'], $message);
            $message = str_replace('%password%', $this->substitution['password'], $message);
        } else if ($this->notification->code == 'emel.pendaftaran.pengguna.emc') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%emel%', $this->substitution['emel'], $message);
            $message = str_replace('%nama%', $this->substitution['name'], $message);
            $message = str_replace('%username%', $this->substitution['username'], $message);
            $message = str_replace('%password%', $this->substitution['password'], $message);
        } else if ($this->notification->code == 'emel.tiada.pengesahan.pengguna.pp') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%sebab_ditolak%', $this->substitution['sebab_ditolak'], $message);
            $message = str_replace('%peranan%', $this->substitution['peranan'], $message);
        } else if ($this->notification->code == 'emel.pengesahan.pengguna.eo') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%password%', $this->substitution['password'], $message);
            $message = str_replace('%username%', $this->substitution['username'], $message);
        } else if ($this->notification->code == 'emel.tiada.pengesahan.pengguna.eo') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%username%', $this->substitution['username'], $message);
            $message = str_replace('%sebab_ditolak%', $this->substitution['sebab_ditolak'], $message);
        } else if ($this->notification->code == 'emel.pengesahan.pengguna.emc') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%password%', $this->substitution['password'], $message);
            $message = str_replace('%username%', $this->substitution['username'], $message);
        } else if ($this->notification->code == 'emel.tiada.pengesahan.pengguna.emc') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%username%', $this->substitution['username'], $message);
            $message = str_replace('%sebab_ditolak%', $this->substitution['sebab_ditolak'], $message);
        } else if ($this->notification->code == 'emel.pendaftaran.stesen') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%fasa%', $this->substitution['fasa'], $message);
        } else if ($this->notification->code == 'emel.pengesahan.stesen') {
            $message = str_replace('%no_fail_jas%', $this->substitution['no_fail_jas'], $this->notification->message);
            $message = str_replace('%nama_projek%', $this->substitution['nama_projek'], $message);
            $message = str_replace('%fasa%', $this->substitution['fasa'], $message);
        }

        return (new MailMessage)
            ->subject($this->notification->name)
            ->line(new HtmlString($message));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
