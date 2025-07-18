<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactStoreRequest;
use App\Models\Contact;
use App\Models\WebsiteSetting;

class ContactController extends Controller
{
    public function contactPage(){
        $pageTitle = 'Contact Us';
        $website_setting = WebsiteSetting::select(['phone', 'address', 'email', 'footer_content', 'google_map'])->get()->first();

        return view('website.contact-us', compact([
            'pageTitle',
            'website_setting'
        ]));
    }


    public function contactForm(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'message' => 'required|string|max:1000',
        ]);


        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return response()->json(['success' => true]);

    }




}
