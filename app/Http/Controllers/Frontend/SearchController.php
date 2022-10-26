<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index(Request $request) {
        $search = $request->get('search') ?? '';

        $data['user'] = $request->user();
        $slug = $request->slugCategory;
        $data['categories'] = Category::where('parent_id', 0)->get();

        if($search == ''){
            $articles = Article::with(['author', 'category', 'tags']);
        }
        else{
            $articles = Article::search("title: ({$search})")
                ->query(fn ($query) => $query->with(['author', 'category', 'tags']));
        }

        $data['articles'] = $articles->paginate(10);

        $data['slug'] = $slug;
        $data['title'] = "Tìm kiếm";
        $data['search'] = $search;

        return view('frontend.layouts.search', $data);
    }
}
