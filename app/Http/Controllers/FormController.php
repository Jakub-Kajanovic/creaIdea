<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\FormSubmission;

class FormController extends Controller
{
    public function index()
    {
        $submissions = FormSubmission::paginate(10);
        return view('admin.form.index', compact('submissions'));
    }
    public function store(Request $request)
    {
        // Validácia údajov z formulára
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|numeric',
            'message' => 'required|string',
        ]);
    
        // Uloženie do databázy
        $submission = FormSubmission::create($request->only(['name', 'email', 'phone', 'message']));
    
        // Odoslanie emailu s údajmi majiteľovi
        Mail::send('emails.form-submitted', [
            'name' => $submission->name,
            'phone' => $submission->phone,
            'email' => $submission->email,
            'messageBody' => $submission->message, // Pre správu používame 'messageBody'
        ], function($message) {
            $message->to('info@creaidea.sk')
                    ->subject('Nový kontakt z formuláru');
        });
    
        return redirect('/dakujeme-za-spravu')->with('success', 'Vaša správa bola úspešne odoslaná.');
    }
    
    public function destroy(FormSubmission $submission)
    {
        $submission->delete();
        return redirect('/admin/form-submissions')->with('success', 'Submission deleted successfully.');
    }
}