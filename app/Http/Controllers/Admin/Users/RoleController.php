<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\User\RoleService;
use App\Models\Role;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RoleController extends Controller
{
    protected $roleService;

    public function __construct(RoleService $roleService)
    {
        $this->roleService = $roleService;
    }
    public function index(Request $request){
        $search = $request->search ?? "";
        if($search != ""){
            $roles = $this->roleService->search($search);
        }
        else{
            $roles = $this->roleService->getAll();
        }
        return view('admin.role.list', [
            'title' => 'Danh sách role',
            'roles' => $roles,
            'search' => $search
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.role.create', [
            'title' => 'Tạo mới role',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $result = $this->roleService->insert($request);
        if($result){
            return redirect('/admin/role/list');
        }
        return redirect()->back();
    }

    public function show(Role $role)
    {
        return view('admin.role.edit',[
            'title' => 'Cập nhật role',
            'role' => $role
        ]);
    }

    public function update(Request $request, Role $role)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $result = $this->roleService->update($request, $role);
        if($result){
            return redirect('/admin/role/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->roleService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công role'
            ]);
        }
        return response()->json(['error' => true]);
    }

}
