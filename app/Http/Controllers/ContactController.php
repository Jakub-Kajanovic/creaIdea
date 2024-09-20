<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function formsubmit(Request $request)
    {
        // Validácia údajov z formulára
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        // Odoslanie emailu s údajmi majiteľovi
        Mail::send('emails.contact', [
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'messageBody' => $request->input('message'), // Pre správu používame 'messageBody'
        ], function($message) use ($request) {
            $message->to('kajanovic@irubiq.com')
                    ->subject('Nová správa z kontaktného formulára');
        });
        
        return redirect()->back()->with('success', 'Vaša správa bola úspešne odoslaná.');
    }
}

