<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\User\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',[
            'title' => "Login He Thong"
        ]);
    }

    public function authenticate(Request $request){
        $this->validate($request, [
            'email' => 'required|email:filter',
            'password' => 'required'
        ]);

        if(Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ], $request->input('remember')))
        {
            $idUser = Auth::id();
            $rs = DB::table('role_user')
                ->join('users', 'user_id', '=', 'users.id')
                ->distinct()
                ->where('role_id', '1')
                ->where('user_id', $idUser)
                ->get();

            if(count($rs) == 1){
                return redirect()->route('admin');
            }
            else{
                Session::flash('error', 'User mà đòi vào trang quản trị à');
                return redirect()->back();
            }
        }

        Session::flash('error', 'Email hoặc password không chính xác');
        return redirect()->back();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/admin/users/login');
    }
}
