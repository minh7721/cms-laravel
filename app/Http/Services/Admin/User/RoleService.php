<?php

namespace App\Http\Services\Admin\User;

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class RoleService
{
    public function getAll(){
        return Role::orderByDesc('id')->paginate(10);
    }
    public function search($search){
        return Role::orderbyDesc('id')->where('name', 'like', '%'.$search.'%')->paginate(20);
    }

    public function insert($request){
        try {
            $request->except('_token');
            Role::create([
                'name' => (string) $request->input('name'),
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

    public function update($request, $role){
        try {
            $role->name = (string) $request->input('name');
            $role->save();
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
        $tag = Role::where('id', $request->input('id'))->first();
        if($tag){
            $tag->delete();
            return true;
        }
        return false;
    }

}
