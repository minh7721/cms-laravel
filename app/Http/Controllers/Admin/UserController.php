<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function __construct()
    {
//        parent::__construct();
    }

    public function index(Request $request): Factory|View|Application
    {
        $search = $request->search ?? '';
        if($search != ''){
            $users = User::with('roles')->where('name', 'like', '%'.$search.'%')->paginate(10);
        }
        else{
            $users = User::with('roles')->paginate(10);
        }
        $data['title'] = "Users";
        $data['users'] = $users;
        $data['search'] = $search;
        return view('admin.users.index', $data);
    }

    public function show(User $id): Factory|View|Application
    {
        $data['title'] = "Preview";
        $data['user'] = $id;
        return view('admin.users.show', $data);
    }

    //GET
    public function create(Request $request): Factory|View|Application
    {
        $data['title'] = 'Add Users';
        return view('admin.users.create', $data);
    }

    //POST
    public function store(UserRequest $request): RedirectResponse
    {
        try {
            User::create([
                'name' => (string) $request->input('name'),
                'email' => (string) $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
                'role_id' => $request->input('role_id'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Session::flash('success', 'Tạo mới user thành công');
            return redirect('admin/user');
        }
        catch (\Exception $err){
            Session::flash('error', 'Tạo mới user thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    //GET
    public function edit(User $id) {
        $data['title'] = 'Edit user';
        $data['user'] = $id;
        return view('admin.users.edit', $data);
    }

    //POST
    public function update(UserRequest $request, User $id) {
        try {
            $id->name = (string) $request->input('name');
            $id->email = (string) $request->input('email');
            $id->email_verified_at = now();
            $id->password = Hash::make($request->input('password')) ;
            $id->save();
            $id->fill($request->input());
            $id->save();
            Session::flash('success', 'Cập nhật thông tin thành công');
            return redirect('admin/user');

        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    public function delete(Request $request) {
        $user = User::where('id', $request->id);
        if($user){
            $user->delete();
            Session::flash('success', 'Xóa user thành công');
            return redirect()->back();
        }
        Session::flash('error', 'Xóa user thất bại');
        return redirect()->back();

    }

    public function loginAnotherUser(User $id): Redirector|RedirectResponse|Application
    {
        $current_user = Auth::user();
        $after_user_id = User::where('id', $id->id)->get()[0];

        if($current_user->role_id == 1){
            if ($after_user_id->role_id == 3){
                Auth::login($id);
                return redirect('/');
            }
            Auth::login($id);
            return redirect('/admin');
        }
        elseif($current_user->role_id == 2){
            if ($after_user_id->role_id == 1){
                return redirect()->back();
            }
            if ($after_user_id->role_id == 3){
                Auth::login($id);
                return redirect('/');
            }
            Auth::login($id);
            return redirect('/admin');
        }
        else{
            return redirect()->back();
        }

    }

}
