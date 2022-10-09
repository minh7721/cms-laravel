<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangePassRequest;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile(Request $request){
        $data['title'] = 'Profile';
        $data['user'] = $request->user();
        return view('frontend.users.profile', $data);
    }

    public function update(UserProfileRequest $request){
        $user = Auth::user();
        try {
            $user->name = (string) $request->input('name');
            $user->email = (string) $request->input('email');
            $user->email_verified_at = now();
            $user->save();
            Session::flash('success', 'Cập nhật thông tin thành công');
            return redirect()->route('frontend.user.profile');

        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    public function changePass(Request $request){
        $data['title'] = 'Đổi mật khẩu';
        $data['user'] = $request->user();
        return view('frontend.users.changepassword', $data);
    }

    public function updatePassword(UserChangePassRequest $request){
        #Kiem tra pass cu
        if(!Hash::check($request->old_password, auth()->user()->password)){
            return back()->with("error", "Mật khẩu cũ chưa đúng");
        }
        #Update pass moi
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        return back()->with("status", "Đổi mật khẩu thành công!");
    }
}
