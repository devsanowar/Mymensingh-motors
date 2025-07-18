<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SubscriberController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate(
            [
                'phone' => ['required', 'regex:/^(01[3-9][0-9]{8}|\+8801[3-9][0-9]{8})$/', 'unique:newsletter_subscribers,phone'],
            ],
            [
                'phone.required' => 'The phone number is required.',
                'phone.regex' => 'Please enter a valid Bangladeshi phone number (e.g., 017XXXXXXXX or +88017XXXXXXXX).',
                'phone.unique' => 'This phone number is already subscribed.',
            ],
        );

        NewsletterSubscriber::create([
            'phone' => $request->phone,
        ]);

        return response()->json(['success' => true]);
    }
}
