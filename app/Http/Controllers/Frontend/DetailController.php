<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    public function index(Request $request): Factory|View|Application
    {
        $data['user'] = $request->user();
        $slug = $request->slugArticle;
        $data['categories'] = Category::where('parent_id', 0)->get();
        $data['article'] = Article::with('author')
            ->with('category')
            ->whereHas('tags')
            ->where('slug', $slug)
            ->first();
//        dd($data['article']);
        $data['article']->views = $data['article']->views +1 ;
        $data['article']->save();

        $idCategory = Category::where('id', $data['article']->category_id)->first();
        $data['articles'] = Article::with('author')
            ->with('category')
            ->whereHas('tags')
            ->where('category_id', $idCategory->id)
            ->orderBy('id', 'desc')
            ->paginate(5);
        $data['title'] = "Chi tiết";
        $data['slug'] = $slug;
        return view('frontend.layouts.detail', $data);
    }
}
