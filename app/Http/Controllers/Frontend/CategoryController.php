<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $data['user'] = $request->user();
        $slug = $request->slugCategory;
        $idCategory = Category::where('slug', $slug)->get()[0];
        $data['categories'] = Category::where('parent_id', 0)->get();
        $data['articles'] = Article::with('author')
            ->with('category')
            ->whereHas('tags')
            ->where('category_id', $idCategory->id)
            ->orderBy('id', 'desc')
            ->paginate(5);
        $data['slug'] = $slug;
        $data['title'] = "Danh mục";
        return view('frontend.layouts.category', $data);
    }
}
