<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;

class MailSend extends Controller
{
    public function mailsend($email)
    {
        $details = [
            'title' => 'Confirmación de pedido',
            'body' => 'Hola [cliente], ¡muchas gracias por realizar tu pedido, con nº [numpedido] en nuestra tienda! A continuación te facilitamos los datos de tu pedido'
        ];

        \Mail::to($email)->send(new SendMail($details));
        return view('/home');
    }
}
