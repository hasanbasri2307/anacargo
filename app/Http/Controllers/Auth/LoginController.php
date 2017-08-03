<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm(){
        return view("login");
    }

    public function login(LoginRequest $request){
        $findByEmail = User::where("email",$request->input("email"))->first();

        if($findByEmail->status == "deactive"){
            return back()->withInput()->with(['error'=>'Akun anda sudah di nonaktifkan.']);
        }elseif($findByEmail->status == "suspend"){
            return back()->withInput()->with(['error'=>'Akun anda telah di suspend.']);
        }

        if(Auth::attempt(["email"=>$request->input("email"),"password"=>$request->input("password")],($request->has("rememberme") ? true:false))){
            $user = User::where("email",$request->input("email"))->update(["last_login"=>date("Y-m-d H:i:s")]);
            return redirect('home');
        }

        return back()->withInput()->with(['error'=>'Email atau password anda salah.']);
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect("/")->with(['success'=>'Berhasil Logout.']);
    }
}
    