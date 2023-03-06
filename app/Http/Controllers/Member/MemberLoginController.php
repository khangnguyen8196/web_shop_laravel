<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class MemberLoginController extends Controller
{
    public function showLogin()
    {
        return view('front-end.login');
    }

    public function customerLogin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        $customer = Customer::attemptLogin($email, $password);

        if (!$customer) {
            return redirect('/login')->with('error', 'Thông tin đăng nhập không chính xác.');
        }

        Auth::guard('customer')->login($customer);

        return redirect('/');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
