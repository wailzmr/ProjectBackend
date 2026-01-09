<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\ContactMessageReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Public contact form
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store contact message (public)
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);


        ContactMessage::create($data);

        // Mail is configured as log, so this is safe
        Mail::raw($data['message'], function ($mail) use ($data) {
            $mail->to('admin@ehb.be')
                ->subject($data['subject']);

        });

        return back()->with('success', 'Message sent successfully.');
    }

    /**
     * Admin: list all contact messages
     */
    public function adminIndex()
    {
        $messages = ContactMessage::latest()->get();
        return view('admin.contacts.index', compact('messages'));
    }

    /**
     * Admin: show one contact message
     */
    public function adminShow(ContactMessage $contactMessage)
    {
        return view('admin.contacts.show', compact('contactMessage'));
    }

    /**
     * Admin: show a single contact message with replies
     */
    public function show(ContactMessage $contactMessage)
    {
        $contactMessage->load('replies');
        return view('admin.contacts.show', compact('contactMessage'));
    }

    /**
     * Admin: store a reply to a contact message
     */
    public function storeReply(Request $request, ContactMessage $contactMessage)
    {
        $data = $request->validate([
            'reply' => 'required|string',
        ]);

        $contactMessage->replies()->create($data);

        return back()->with('success', 'Reply sent successfully.');
    }
}
