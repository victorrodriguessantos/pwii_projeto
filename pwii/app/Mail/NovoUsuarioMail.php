<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NovoUsuarioMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $senha;

    /**
     * Create a new message instance.
     */
    public function __construct($email, $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }

    /**
     * Build the message.
     */
    public function build()
    {
        return $this->subject('Seus dados de acesso')
                    ->view('emails.novo_usuario')
                    ->with([
                        'email' => $this->email,
                        'senha' => $this->senha,
                    ]);
    }
}
