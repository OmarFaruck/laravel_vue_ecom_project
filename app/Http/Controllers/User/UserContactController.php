<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\ContactUs; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserContactController extends Controller
{
    public function usercontact(Request $request){
        // Validate the email
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:contact_us,email',
        'subject' => 'required|string|max:255',
        'message' => 'required|string',
    ], [
    'email.required' => 'Email address is required.',
    'email.email' => 'Please enter a valid email address.',
    'email.unique' => 'This email is already used for a contact message.',
   ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        try {
            // Save subscriber to database
            $subscriber = ContactUs::create([
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'message' => $request->message,
            ]);

            // Send welcome email
            // Mail::to($request->email)->send(new SubscriberMail());

            return back()->with('success', 'Thank you for contacting us. We will get back to you soon.');
            // return back()->with('success', 'Thank you for subscribing! Check your email for a welcome message.');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again later.');
        }
    }
}
