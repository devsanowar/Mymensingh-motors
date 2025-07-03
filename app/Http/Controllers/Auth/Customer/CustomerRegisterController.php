<?php

namespace App\Http\Controllers\Auth\Customer;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\CustomerStoreRequest;

class CustomerRegisterController extends Controller
{
    public function registerPage(){
        return view('auth.customer.register');
    }

    public function customerRegister(CustomerStoreRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email ?? 'guest_' . time() . rand(100, 999) . '@example.com',
            'system_admin' => 'Customer',
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user); // Auto login

        Toastr::success('Welcome! Your account has been created.');
        return redirect()->route('customer.dashboard'); // Or wherever your dashboard is
    }

}
