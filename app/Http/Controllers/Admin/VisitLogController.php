<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisitorLog;
use Illuminate\Http\Request;

class VisitLogController extends Controller
{
    public function index(){
        $logs = VisitorLog::latest()->get(); 
        return view('admin.layouts.pages.visit-log.index', compact('logs'));
    }


     public function trackVisitor(Request $request)
    {
        // JSON ফাইলের path
        $filePath = storage_path('app/visitor_count.json');

        // Session ব্যবহার করে একই session-এ বারবার না গোনার জন্য
        if (!$request->session()->has('counted')) {
            $request->session()->put('counted', true);

            // যদি ফাইল না থাকে তাহলে তৈরি করি
            if (!file_exists($filePath)) {
                $data = [
                    'total' => 1,
                    'monthly' => [
                        date('F Y') => 1 // June 2025
                    ]
                ];
            } else {
                // পুরোনো ডেটা পড়ি
                $data = json_decode(file_get_contents($filePath), true);

                // Total visitor বাড়াই
                $data['total'] = isset($data['total']) ? $data['total'] + 1 : 1;

                // মাসিক হিসাব রাখি
                $currentMonth = date('F Y');
                if (isset($data['monthly'][$currentMonth])) {
                    $data['monthly'][$currentMonth]++;
                } else {
                    $data['monthly'][$currentMonth] = 1;
                }
            }

            // ডেটা আবার JSON ফাইলে লিখি
            file_put_contents($filePath, json_encode($data, JSON_PRETTY_PRINT));
        }

        // View দেখাই (অথবা যেকোনো রেসপন্স)
        return view('admin.layouts.pages.visit-log.index'); // আপনার তৈরি view
    }



}
