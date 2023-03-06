<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Customer;
use App\Models\CustomerReferral;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function loadRegister()
    {
        return view('front-end.register');
    }

    public function registered(Request $request)
    {
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|string|email|max:100|unique:users',
            'password' => 'required|min:6|confirmed'
        ]);

        $referralCode = Str::random(8);

        if(isset($request->referral_code)){
            $customerData =Customer::where('referral_code', $request->referral_code)->get();

            if(count($customerData)>0){
                $child_customer_id= Customer::insertGetId([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>Hash::make($request->password),
                    'referral_code'=>$referralCode
                ]);
                CustomerReferral::insert([
                    'referral_code' => $request->referral_code,
                    'child_customer_id' => $child_customer_id,
                    'parent_customer_id' => $customerData[0]['id'],
                ]);
            }else {
                return back()->with('error','Please enter Valid referral Code!');
            }
        }else{
            Customer::insert([
                'name'=>$request->name,
                'email'=>$request->email,
                'password'=>Hash::make($request->password),
                'referral_code'=>$referralCode
            ]);
        }
        return back()->with('success','your Register has been Successfully !');
    }
}
