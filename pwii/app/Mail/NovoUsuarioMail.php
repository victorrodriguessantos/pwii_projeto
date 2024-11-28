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
     * Cria uma nova instância.
     *
     * @param string $email
     * @param string $senha
     */
    public function __construct($email, $senha)
    {
        $this->email = $email;
        $this->senha = $senha;
    }

    /**
     * Cria o e-mail.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Seus dados de acesso')
                    ->view('novo_usuario') // Aqui é onde a view será chamada
                    ->with([
                        'email' => $this->email,
                        'senha' => $this->senha,
                    ]);
    }
}
