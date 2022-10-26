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
        $search = $request->get('search') ?? '';

        $data['user'] = $request->user();
        $slug = $request->slugCategory;
        $idCategory = Category::where('slug', $slug)->get()[0];
        $data['categories'] = Category::where('parent_id', 0)->get();

        if($search == ''){
            $articles = Article::with(['author', 'category', 'tags'])
            ->where('category_id', $idCategory->id);
        }
        else{
            $articles = Article::search("title: ({$search})")
                ->query(fn ($query) => $query->with(['author', 'category', 'tags']))
                ->where('category_id', $idCategory->id);
        }


        $data['articles'] = $articles->paginate(10);

//        $data['articles'] = Article::with('author')
//            ->with('category')
//            ->whereHas('tags')
//            ->where('category_id', $idCategory->id)
//            ->orderBy('id', 'desc')
//            ->paginate(20);
        $data['slug'] = $slug;
        $data['title'] = "Danh mục";
        $data['search'] = $search;

        return view('frontend.layouts.category', $data);
    }
}
