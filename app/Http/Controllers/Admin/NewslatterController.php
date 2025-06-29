<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NewsletterSubscriber;
use Brian2694\Toastr\Facades\Toastr;

class NewslatterController extends Controller
{
    public function index()
    {
        $subscribers = NewsletterSubscriber::latest()->get();
        return view('admin.layouts.pages.subscriber.index', compact('subscribers'));
    }

    public function destroy($id)
    {
        $subscriber = NewsletterSubscriber::findOrFail($id);
        $subscriber->delete();

        return response()->json(['success' => true, 'message' => 'Subscriber deleted successfully!']);
    }
}
