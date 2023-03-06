@extends('layouts.admin.master-without-nav')
    
@section('content')
<main class="login-form">
<div class="cotainer">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Register</div>
                <div class="card-body">

                    <form action="{{ route('registered') }}" method="POST">
                        @csrf
                        <div class="form-group row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input type="text" id="name" class="form-control" value="{{ old('name') }}" 
                                name="name" placeholder="Enter Name" />
                                @error('name')
                                    <span style = "color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input type="text" id="email_address" class="form-control"
                                 value="{{ old('email') }}" name="email" placeholder="Enter email"/>
                                @error('email')
                                <span style = "color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="referral_code" class="col-md-4 col-form-label text-md-right">Referral Code</label>
                            <div class="col-md-6">
                                <input type="text" id="referral_code" class="form-control" 
                                value="{{ old('referral_code') }}" name="referral_code" placeholder="Enter Referral Code(Option)">
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" 
                                name="password" placeholder="Enter Password" />
                                    <div id="eye">
                                        <i class="far fa-eye"></i>
                                    </div>
                                @error('password')
                                    <span style = "color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <label for="password_confirmation" class="col-md-4 col-form-label text-md-right">Password</label>
                            <div class="col-md-6">
                                <input type="password" id="password" class="form-control" 
                                name="password_confirmation" placeholder="Enter Confirm Password" />
                                    <div id="eye">
                                        <i class="far fa-eye"></i>
                                    </div>
                                @error('password')
                                    <span style = "color:red">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="checkbox">
                                    <p class="mb-0">
                                        <a href="{{ route('customer.login') }}" class="text-center">Return to Login</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                Register
                            </button>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@if(Session::has('success'))
    <span class="center" style="color:green">{{ Session::get('success')}}</span>
@endif
@if(Session::has('error'))
    <span class="center" style="color:red">{{ Session::get('error')}}</span>
@endif
</main>
@endsection