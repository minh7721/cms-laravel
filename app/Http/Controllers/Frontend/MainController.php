<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
        $slug = $request->path();
        $data['categories'] = Category::where('parent_id', 0)->get();
        $data['articles'] = Article::with('author')
            ->with('category')
            ->whereHas('tags')
            ->orderBy('id', 'desc')
            ->paginate(5);
        $data['title'] = "Trang chủ";
        $data['slug'] = $slug;
        return view('frontend.layouts.main', $data);
    }

}
