<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserChangePassRequest;
use App\Http\Requests\UserProfileRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function profile(Request $request): Factory|View|Application
    {
        $data['title'] = 'Profile';
        $data['user'] = $request->user();
        $user = Auth::user();
//        $imgUrl = Storage::disk('s3')->url('avatars/'.$user->id.'/'.$user->thumb);
//        $path = Storage::disk('s3')->path('avatars/'.$user->id.'/'.$user->thumb);
        return view('frontend.users.profile', $data,);
    }

    public function update(UserProfileRequest $request): RedirectResponse
    {
        $user = Auth::user();
        try {
            if ($request->hasFile('avatar')){
//                $file = $request->file('avatar');
//                $fileName = $file->getClientOriginalName();
//                $file->storeAs('avatars/'.$user->id, $fileName, 's3');
                $user->name = (string) $request->input('name');
                $user->email = (string) $request->input('email');
                $user->thumb = $request->input('thumb');
                $user->email_verified_at = now();
                $user->save();

                Session::flash('success', 'Cập nhật thông tin thành côn');
                return redirect()->route('frontend.user.profile');
            }
            else{
                $user->name = (string) $request->input('name');
                $user->email = (string) $request->input('email');
                $user->email_verified_at = now();
                $user->save();
                Session::flash('success', 'Cập nhật thông tin thành công');
                return redirect()->route('frontend.user.profile');
            }
        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    public function changePass(Request $request): Factory|View|Application
    {
        $data['title'] = 'Đổi mật khẩu';
        $data['user'] = $request->user();
        return view('frontend.users.changepassword', $data);
    }

    public function updatePassword(UserChangePassRequest $request): RedirectResponse
    {
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
