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
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/** @deprecated  */
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
        $roles = $this->userServices->getRole();
        return view('admin.users.create', [
            'title' => 'Tạo mới users',
            'roles' => $roles
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
        $roles = $this->userServices->getRole();
        return view('admin.users.edit',[
            'title' => 'Cập nhật user',
            'user' => $user,
            'roles' => $roles
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

    public function loginAnotherUser(User $user){
        $current_user = Auth::id();
        $current_user_id = DB::table('role_user')->select('role_id')->where('user_id', $current_user)->get()[0]->role_id;
        $after_user_id = DB::table('role_user')->select('role_id')->where('user_id', $user->id)->get()[0]->role_id;

       if($current_user_id == 1){
           if ($after_user_id == 3){
               Auth::login($user);
               return redirect('/');
           }
           Auth::login($user);
           return redirect('/admin');
       }
        elseif($current_user_id == 2){
            if ($after_user_id == 1){
                return redirect()->back();
            }
            if ($after_user_id == 3){
                Auth::login($user);
                return redirect('/');
            }
            Auth::login($user);
            return redirect('/admin');
        }
       else{
           return redirect()->back();
       }

    }
}
