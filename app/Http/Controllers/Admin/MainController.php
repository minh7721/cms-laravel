<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index(Request $request){

        $current_user_id = DB::table('role_user')->select('role_id')->where('user_id', Auth::id())->get()[0]->role_id;
        if ($current_user_id == 3){
            return redirect('/');
        }
        return view('admin.home',[
            'title' => "Trang quản trị Admin",
        ]);
    }


}
