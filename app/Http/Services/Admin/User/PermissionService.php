<?php

namespace App\Http\Services\Admin\User;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
/** @deprecated  */
class PermissionService
{
    public function getAll(){
        return Permission::orderByDesc('id')->paginate(10);
    }
    public function search($search){
        return Permission::orderbyDesc('id')->where('name', 'like', '%'.$search.'%')->paginate(20);
    }

    public function insert($request){
        try {
            $request->except('_token');
            Permission::create([
                'name' => (string) $request->input('name'),
            ]);
            Session::flash('success', 'Tạo mới Permission thành công');
        }
        catch (\Exception $err){
            Session::flash('error', 'Tạo mới Permission thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $permission){
        try {
            $permission->name = (string) $request->input('name');
            $permission->save();
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
        $tag = Permission::where('id', $request->input('id'))->first();
        if($tag){
            $tag->delete();
            return true;
        }
        return false;
    }

}
