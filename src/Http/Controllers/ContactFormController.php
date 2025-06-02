<?php

namespace Atk\Contact\Http\Controllers;
use Mail;
use Illuminate\Http\Request;
use Atk\Contact\Models\Contact;
use Atk\Contact\Mail\InquiryEmail;
use Illuminate\Routing\Controller as BaseController;

class ContactFormController extends BaseController
{
    public function create()
    {
        return view('contact::create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255|unique:contacts,email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        Contact::create($validated); 
        $adminEmail = config('contact.admin_email');
        if (!$adminEmail) {
            return redirect()->back()->withErrors(['admin_email' => 'Admin email is not configured.']);
        }
        Mail::to($adminEmail)->send(new InquiryEmail($validated));

        return redirect()->back()->with('success', 'Contact form submitted successfully!');
    }
}