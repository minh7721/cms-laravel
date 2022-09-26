<?php

namespace App\Http\Services\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function getRole(){
        return Role::orderBy('id', 'asc')->get();
    }

    public function getAll(){
        return User::with('role')->orderByDesc('id')->paginate(20);
    }
    public function search($search){
        return User::orderbyDesc('id')->where('name', 'like', '%'.$search.'%')->paginate(20);
    }

    public function insert($request){
        try {
            $request->except('_token');
            User::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'email_verified_at' => now(),
                'password' => Hash::make($request->input('password')) ,
                'role_id' => (int) $request->input('roleUser')
            ]);
            Session::flash('success', 'Tạo mới user thành công');
        }
        catch (\Exception $err){
            Session::flash('error', 'Tạo mới user thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $user){
        try {
            $user->name = (string) $request->input('name');
            $user->email = (string) $request->input('email');
            $user->email_verified_at = now();
            $user->password = Hash::make($request->input('password')) ;
            $user->role_id =  (int) $request->input('roleUser');
            $user->save();

            Session::flash('success', 'Cập nhật thông tin thành công');
        }
        catch (\Exception $err){
            Session::flash('success', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $tag = User::where('id', $request->input('id'))->first();
        if($tag){
            $tag->delete();
            return true;
        }
        return false;
    }

}
