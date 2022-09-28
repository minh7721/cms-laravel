<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\User\PermissionService;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    protected $permissionService;

    public function __construct(PermissionService $permissionService)
    {
        $this->permissionService = $permissionService;
    }
    public function index(Request $request){
        $search = $request->search ?? "";
        if($search != ""){
            $permissions = $this->permissionService->search($search);
        }
        else{
            $permissions = $this->permissionService->getAll();
        }
        return view('admin.permission.list', [
            'title' => 'Danh sách permissions',
            'permissions' => $permissions,
            'search' => $search
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.permission.create', [
            'title' => 'Tạo mới permissions',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $result = $this->permissionService->insert($request);
        if($result){
            return redirect('/admin/permission/list');
        }
        return redirect()->back();
    }

    public function show(Permission $permission)
    {
        return view('admin.permission.edit',[
            'title' => 'Cập nhật permission',
            'permission' => $permission
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $result = $this->permissionService->update($request, $permission);
        if($result){
            return redirect('/admin/permission/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->permissionService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công role'
            ]);
        }
        return response()->json(['error' => true]);
    }
}
