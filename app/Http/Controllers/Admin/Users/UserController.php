<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\User\UserService;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userServices;

    public function __construct(UserService $userService)
    {
        $this->userServices = $userService;
    }
    public function index(Request $request){
        $search = $request->search ?? "";
        if($search != ""){
            $users = $this->userServices->search($search);
        }
        else{
            $users = $this->userServices->getAll();
        }
        return view('admin.users.list', [
            'title' => 'Danh sách người dùng',
            'users' => $users,
            'search' => $search
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.users.create', [
            'title' => 'Tạo mới users',
            'roles' => $this->userServices->getRole()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $result = $this->userServices->insert($request);
        if($result){
            return redirect('/admin/users/list');
        }
        return redirect()->back();
    }

    public function show(User $user)
    {
//        dd($user);
        return view('admin.users.edit',[
            'title' => 'Cập nhật user',
            'user' => $user,
            'roles' => $this->userServices->getRole()
        ]);
    }

    public function update(Request $request, User $user)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);

        $result = $this->userServices->update($request, $user);
        if($result){
            return redirect('/admin/users/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->userServices->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công user'
            ]);
        }
        return response()->json(['error' => true]);
    }

}
