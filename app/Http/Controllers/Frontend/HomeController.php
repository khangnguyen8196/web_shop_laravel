<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // if (Cookie::has('ref_code')) {
        //     Cookie::queue(Cookie::forget('ref_code'));
        // }
        // if (!empty($ref_code)){
        //     Cookie::queue('ref_code',$ref_code);
        // }
        return view('front-end.homepage.index');
    }
}
