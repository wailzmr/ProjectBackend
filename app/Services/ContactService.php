<?php

namespace App\Services;

use App\Models\ContactMessage;
use App\Mail\ContactMessageSubmitted;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    /**
     * Handle storing the contact message and sending notification email.
     *
     * @param  array<string, mixed>  $data
     * @return \App\Models\ContactMessage
     */
    public function handle(array $data): ContactMessage
    {
        // Persist contact message
        $contact = ContactMessage::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'subject' => $data['subject'],
            'message' => $data['message'],
        ]);

        // Notify admin (local environment will write to log)
        Mail::to('admin@ehb.be')->send(new ContactMessageSubmitted($contact));

        return $contact;
    }
}

