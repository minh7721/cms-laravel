<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use DateTime;
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
            DB::table('users')->insert([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'thumb' => 'data:image/jpeg;base64,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',
                'remember_token' => Str::random(10),
                'email_verified_at' => now(),
                'role_id' => 3,
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);

            Session::flash('success', 'Tạo mới user thành công');
            return redirect()->route('admin.user.index');
        }
        catch (\Exception $err){
            Session::flash('error', 'Tạo mới user thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    //GET
    public function edit(Request $request, User $id) {
        $current_user = Auth::user();
        if($current_user->role_id == 1){
            $data['title'] = 'Edit user';
            $data['user'] = $id;

            return view('admin.users.edit', $data);
        }
        Session::flash('error', 'Bạn không có quyền sửa!!!');
        return redirect()->back();
    }

    //POST
    public function update(UserRequest $request, User $id) {
        try {
            $current_user = Auth::user();
            $user = User::where('id', $request->id)->get()[0];
            if($current_user->role_id == 1){
                $id->name = (string) $request->input('name');
                $id->email = (string) $request->input('email');
                $id->email_verified_at = now();
                $id->password = Hash::make($request->input('password')) ;
                $id->save();
                $id->fill($request->input());
                $id->save();
                Session::flash('success', 'Cập nhật thông tin thành công');
                return redirect()->route('admin.user.index');
            }
            elseif($current_user->role_id == 2){
                if($user->role_id >=2 ){
                    $id->name = (string) $request->input('name');
                    $id->email = (string) $request->input('email');
                    $id->email_verified_at = now();
                    $id->password = Hash::make($request->input('password')) ;
                    $id->save();
                    $id->fill($request->input());
                    $id->save();
                    Session::flash('success', 'Cập nhật thông tin thành công');
                    return redirect()->route('admin.user.index');
                }
                Session::flash('error', 'Cập nhật thông tin thất bại');
                return redirect()->back();
            }
            Session::flash('error', 'Cập nhật thông tin thất bại');
            return redirect()->back();
        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    public function delete(Request $request) {
        $current_user = Auth::user();
        $user = User::where('id', $request->id)->get()[0];

        if($current_user->role_id == 1){
            $user->delete();
            Session::flash('success', 'Xóa user thành công');
            return redirect()->back();
        }
        elseif($current_user->role_id == 2){
            if($user->role_id >=2 ){
                $user->delete();
                Session::flash('success', 'Xóa user thành công');
                return redirect()->back();
            }
            Session::flash('error', 'Xóa user thất bại');
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
