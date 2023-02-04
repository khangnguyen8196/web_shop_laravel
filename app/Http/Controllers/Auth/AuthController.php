<?php
  
namespace App\Http\Controllers\Auth;
  
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Models\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
  
class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        return view('auth.login');
    }  
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registration()
    {
        return view('auth.registration');
    }
      
    /**
     * Write code on Method
     *
     * @return response();
     */
    public function postLogin(LoginRequest $request)
    { 
        // $credentials = $request->only('email', 'password');
        if (Auth::attempt([
            'email' =>$request->input('email'),
            'password' =>$request->input('password')
        ])) {
            if(Auth::user()->role_id =='1') // 1= Admin Login
            {
                return redirect('dashboard')->with('status','Welcome to your dash board');
            }
            elseif(Auth::user()->role_id =='0' ) //Normal or default User Login
            {
                return redirect()->intended('home')
                        ->withSuccess('You have Successfully logged in');
            }
           
        }
        return redirect("login")->withSuccess('Oppes! You have entered invalid credentials');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function postRegistration(RegisterRequest $request)
    {      
        $data = $request->all();
        $createUser = $this->create($data);
  
        $token = Str::random(64);
  
        UserVerify::create([
              'user_id' => $createUser->id, 
              'token' => $token
            ]);
  
        Mail::send('email.emailVerify', ['token' => $token], function($message) use($request){
              $message->to($request->email);
              $message->subject('Email Verification Mail');
          });
         
        return redirect("home")->withSuccess('Great! You have Successfully loggedin');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function home()
    {
        if(Auth::check()){
            return view('front-end.homepage.index');
        }
  
        return redirect("login")->withSuccess('Opps! You do not have access');
    }
    
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function create(array $data)
    {
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password'])
      ]);
    }
      
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function logout() {
        Session::flush();
        Auth::logout();
  
        return Redirect('login');
    }
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function verifyAccount($token)
    {
        $verifyUser = UserVerify::where('token', $token)->first();
  
        $message = 'Sorry your email cannot be identified.';
  
        if(!is_null($verifyUser) ){
            $user = $verifyUser->user;
              
            if(!$user->is_email_verified) {
                $verifyUser->user->is_email_verified = 1;
                $verifyUser->user->save();
                $message = "Your e-mail is verified. You can now login.";
            } else {
                $message = "Your e-mail is already verified. You can now login.";
            }
        }
  
      return redirect()->route('login')->with('message', $message);
    }
}