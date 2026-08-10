<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ContactUsController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Admin/ContactUs/ContactUsPage', [
            'ContactUs' => ContactUs::all()
        ]);
    }

    public function create()
    {
        // Logic to show form for creating a new contact us message
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        ContactUs::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);
        return redirect()->route('contact_us.index');
    }

    public function edit($id)
    {
        $contactUs = ContactUs::findOrFail($id);
        return Inertia::render('/ContactUs/ContactUsEdit', [
            'contactUs' => $contactUs,
        ]);
    }

    public function update(Request $request, $id)
    {
        $contactUs = ContactUs::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $contactUs->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ]);
        return redirect()->route('contact_us.index');
    }

    public function destroy($id)
    {
        $contactUs = ContactUs::findOrFail($id);
        $contactUs->delete();
        return redirect()->route('contact_us.index');
    }
}

    
  

