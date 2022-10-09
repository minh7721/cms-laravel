<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(Request $request){
        $data['user'] = $request->user();
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

    public function listByTag(Request $request): Factory|View|Application
    {
        $data['user'] = $request->user();
        $slug = $request->tag;
        $idTag = Tag::where('slug', $slug)->get()[0]->id;
        $data['tags'] = Tag::where('length','>', 0)->get();
        $data['articles'] = Article::with('author')
            ->with('category')
            ->with('tags')
            ->whereHas('tags', function (Builder $query) use ($idTag) {
                $query->where('tag_id','=',3);
            })
            ->orderBy('id', 'desc')
            ->paginate(5);
        $data['slug'] = $slug;
        $data['title'] = "Danh sách theo tag";
        return view('frontend.layouts.listByTag', $data);
    }

}
