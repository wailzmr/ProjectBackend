<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Mail\ContactMessageSubmitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Toon het contactformulier
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Verwerk het contactformulier
     */
    public function store(Request $request)
    {

        $contact = ContactMessage::create(
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'email'],
                'subject' => ['required', 'string', 'max:255'],
                'message' => ['required', 'string'],
            ])
        );

        //  Mail naar admin (lokaal: komt in laravel.log)
        Mail::to('admin@ehb.be')->send(
            new ContactMessageSubmitted($contact)
        );

        return redirect()
            ->route('contact.create')
            ->with('success', 'Je bericht is verzonden!');
    }
}

