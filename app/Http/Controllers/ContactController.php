<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Show the contact form.
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Process the contact form submission.
     */
    public function store(StoreContactRequest $request, ContactService $service)
    {
        $service->handle($request->validated());

        return redirect()
            ->route('contact.create')
            ->with('success', 'Je bericht is verzonden!');
    }
}
