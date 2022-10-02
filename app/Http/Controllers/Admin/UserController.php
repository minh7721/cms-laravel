<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
//        parent::__construct();
    }

    public function index(Request $request) {
        $data['title'] = "Users";
        $data['users'] = User::paginate(10);

        return view('admin.users.index', $data);
    }

    public function show(Request $request) {

    }

    //GET
    public function create(Request $request) {

    }

    //POST
    public function store(Request $request) {

    }

    //GET
    public function edit(Request $request) {

    }

    //POST
    public function update(Request $request) {

    }

    public function delete(Request $request) {

    }

}