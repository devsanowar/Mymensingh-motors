<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerDashboardController extends Controller
{
    public function dashboard(){
        return view('auth.customer.customer-dashboard');
    }
}
