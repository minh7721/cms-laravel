<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function index(Request $request) {
        $articles = Article::get();
        $categories = Category::get();
        $tags = Tag::get();
        $users = User::get();
        $data['title'] = 'Dashboard';
        $data['articles'] = count($articles);
        $data['categories'] = count($categories);
        $data['tags'] = count($tags);
        $data['users'] = count($users);
        return view('admin.dashboard.index',$data);
    }
}
