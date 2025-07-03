<?php

namespace App\Http\Controllers\Auth\Customer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CustomerLoginRequest;

class CustomerLoginController extends Controller
{
    public function loginPage(){
        return view('auth.customer.login');
    }

    public function loginFormSubmit(CustomerLoginRequest $request){
         $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials)) {
            Toastr::success('Successfully logged in.');
            return redirect()->route('customer.dashboard');
        }

        return back()->with('error', 'Invalid phone or password!!');
    }
}
