<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Log;

class LogsController extends Controller
{
    public function index()
    {   
        $logs=Log::all();
        $title='Log-user';
        return view('admin.log.list',compact('title','logs'));
    }
}
