<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerRegisterController extends Controller
{
    public function registerPage(){
        return view('auth.customer.register');
    }
    
}
