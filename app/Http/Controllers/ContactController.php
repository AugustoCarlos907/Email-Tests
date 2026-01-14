<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendMail(Request $request)
    {
        // Lógica para enviar o email
            $data = $request->validate([
            'email'   => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
            'file' => 'required|',
        ]);

        Mail::to($data['email'])->send(new Contact([
            'subject' => $data['subject'],
            'message' => $data['message'],
            'file' => $data['file']
        ]));

        echo 'Email enviado com sucesso!';
        // return back()->with('success' , 'Email enviando com successo'.$sent);
    }
}
