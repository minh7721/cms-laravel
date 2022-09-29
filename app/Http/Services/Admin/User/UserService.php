<?php

namespace App\Http\Services\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function getAll(){
        return DB::table('role_user')
            ->join('users', 'user_id', '=', 'users.id')
            ->join('roles', 'role_id', '=', 'roles.id')
            ->select('users.*', 'roles.name as role_name')
            ->distinct()
            ->orderByDesc('users.id')
            ->paginate(20);
    }

    public function loginAdmin($idUser){
        return DB::table('role_user')
            ->join('users', 'user_id', '=', 'users.id')
            ->distinct()
            ->where('role_id', '1')
            ->where('user_id', $idUser)
            ->get();
    }

    public function getRole(){
        return Role::get();
    }

    public function search($search){
        return User::orderbyDesc('id')->where('name', 'like', '%'.$search.'%')->paginate(20);
    }

    public function insert($request){
        try {
            $request->except('_token');
            $user = User::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'email_verified_at' => now(),
                'password' => Hash::make($request->input('password')) ,
            ]);


            DB::table('role_user')->insert([
                'user_id' => $user->id,
                'role_id' => $request->input('roleUser'),
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
            $user->save();

            Session::flash('success', 'Cập nhật thông tin thành công');
        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
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
