<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\ContactMessageReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Public contact form
     */
    public function create()
    {
        $contactMessageId = null;

        if (Auth::check()) {
            $contactMessage = ContactMessage::where('user_id', Auth::id())->latest()->first();
            if ($contactMessage) {
                $contactMessageId = $contactMessage->id;
            }
        }

        return view('contact.create', compact('contactMessageId'));
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

        $data['user_id'] = Auth::id();

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

        $contactMessage->replies()->create([
            'reply' => $data['reply'],
            'user_id' => Auth::id(),
            'is_admin' => true,
        ]);

        return back()->with('success', 'Reply sent successfully.');
    }

    /**
     * User: list own contact messages
     */
    public function userIndex()
    {
        $messages = ContactMessage::query()
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('contacts.index', compact('messages'));
    }

    /**
     * User: view contact message thread
     */
    public function userThread(ContactMessage $contactMessage)
    {
        if ($contactMessage->user_id !== Auth::id()) {
            abort(403);
        }

        $contactMessage->load(['replies' => function ($q) {
            $q->latest();
        }]);

        return view('contacts.thread', compact('contactMessage'));
    }

    /**
     * User: store a reply to a contact message
     */
    public function storeUserReply(Request $request, ContactMessage $contactMessage)
    {
        if ($contactMessage->user_id !== Auth::id()) {
            abort(403);
        }

        $data = $request->validate([
            'reply' => 'required|string',
        ]);

        $contactMessage->replies()->create([
            'reply' => $data['reply'],
            'user_id' => Auth::id(),
            'is_admin' => false,
        ]);

        return back()->with('success', 'Reply sent successfully.');
    }
}
