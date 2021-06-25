<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ConfirmAccount extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    
    private $url;
    private $user;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, $url)
    {
        $this->url = $url;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject('Confirme sua conta');
        $this->to($this->user->email, $this->user->name);
        return $this->view('welcome', [
            'user' => $this->user,
            'url' => $this->url
        ]);
    }
}
