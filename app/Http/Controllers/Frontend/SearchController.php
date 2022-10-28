<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Elastic\ScoutDriverPlus\Support\Query;
use Illuminate\Http\Request;


class SearchController extends Controller
{
    public function index(Request $request) {
        $search = $request->get('search') ?? '';

        $querySearch = Query::matchPhrase()
            ->field('title')
            ->query($search);

        $data['user'] = $request->user();
        $slug = $request->slugCategory;
        $data['categories'] = Category::where('parent_id', 0)->get();

        if($search == ''){
            $articles = Article::with(['author', 'category', 'tags'])->paginate(10);
        }
        else{
            $articles = Article::searchQuery($querySearch)
                ->load(['author', 'category', 'tags'], Article::class)
                ->highlight('title')
                ->sort('id', 'desc')
                ->paginate(10)->onlyModels();
        }

        $data['articles'] = $articles;

        $data['slug'] = $slug;
        $data['title'] = "Tìm kiếm";
        $data['search'] = $search;

        return view('frontend.layouts.search', $data);
    }
}
