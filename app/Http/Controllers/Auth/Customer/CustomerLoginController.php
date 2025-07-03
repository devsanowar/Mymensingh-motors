<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerLoginController extends Controller
{
    public function loginPage(){
        return view('auth.customer.login');
    }
}
