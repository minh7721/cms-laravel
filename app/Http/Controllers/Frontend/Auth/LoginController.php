<?php

namespace App\Http\Controllers\Frontend\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginForm()
    {
        return view('frontend.auth.login');
    }

    public function authenticate(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $user = User::where('email', $email)->first();

        if($user){
            $role = $user->role_id;
            if($role == 3){
                if(Auth::attempt([
                    'email' => $request->input('email'),
                    'password' => $request->input('password')
                ], $request->input('remember'))){
                    return redirect('/');
                }
            }
            else{
                Session::flash('error', 'Email hoặc password không chính xác');
                return redirect()->back();
            }
        }
        Session::flash('error', 'Email hoặc password không chính xác');
        return redirect()->back();
//        if(Auth::attempt([
//            'email' => $request->input('email'),
//            'password' => $request->input('password')
//        ], $request->input('remember')))
//        {
//            $user = Auth::user();
//
//            $rs = User::where('email', $user->email)->first();
//
//            $role = $rs->role_id;
//
//            if($role ==3){
//                return redirect('/');
//            }
//            else{
//                Session::flash('error', 'Email hoặc password không chính xác');
//                return redirect()->back();
//            }
//        }


    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('frontend.auth.login');
    }
}
