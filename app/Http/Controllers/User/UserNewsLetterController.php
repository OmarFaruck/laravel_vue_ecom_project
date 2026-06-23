<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\NewsLetter;
use App\Models\StayUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class UserNewsLetterController extends Controller
{
    public function usernewsletter(Request $request){
         // Validate the email
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:news_letters,email',
    ], [
    'email.required' => 'Email address is required.',
    'email.email' => 'Please enter a valid email address.',
    'email.unique' => 'This email is already subscribed to our newsletter.',
   ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        try {
            // Save subscriber to database
            $subscriber = NewsLetter::create([
                'email' => $request->email,
                'name' => $request->name
            ]);

            // Send welcome email
            // Mail::to($request->email)->send(new SubscriberMail());

            return back()->with('success', 'Thank you for newsletter fillup.');
            // return back()->with('success', 'Thank you for subscribing! Check your email for a welcome message.');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again later.');
        }


    }


    // user subscribe
    public function subscribe(Request $request){
         // Validate the email
      $validator = Validator::make($request->all(), [ 
        'email' => 'required|email|unique:stay_updates,email',
    ], [
    'email.required' => 'Email address is required.',
    'email.email' => 'Please enter a valid email address.',
    'email.unique' => 'This email is already subscribed to our StayUpdate.',
   ]);

        if ($validator->fails()) {
            return back()->withErrors($validator->errors());
        }

        try {
            // Save subscriber to database
            $subscriber = StayUpdate::create([
                'email' => $request->email
            ]);

            // Send welcome email
            // Mail::to($request->email)->send(new SubscriberMail());

            return back()->with('success', 'Thank you for subscriber.');
            // return back()->with('success', 'Thank you for subscribing! Check your email for a welcome message.');

        } catch (\Exception $e) {
            return back()->with('error', 'Something went wrong. Please try again later.');
        }


    }
}