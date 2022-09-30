<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    public function index(){
        return view('auth.register',[
           'title' => 'Đăng ký tài khoản'
        ]);
    }

    public function create(Request $request){

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email:filter',
            'password' => 'required|min:6'
        ]);

        $users = DB::table('users')->get();

        foreach ($users as $user) {
            if($user->email == $request->input('email')){
                Session::flash('error', 'Email đã tồn tại, vui lòng nhập email khác');
                return redirect()->back();
            }
        }
        $newUser = User::create([
            'name' => (string) $request->input('name'),
            'email' => (string) $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'remember_token' => Str::random(10),
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('role_user')->insert([
            'user_id' => $newUser->id,
            'role_id' => '3',
        ]);
        Session::flash('success', 'Đăng ký thành công');
        return redirect('/auth/login');
    }
}
