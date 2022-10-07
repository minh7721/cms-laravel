<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class ArticleController extends Controller
{
    public function index(Request $request) {
        $search = $request->search ?? '';
        $category = $request->category ?? '';
        $tag = $request->tag ?? '';
        if($search != '' || $category != '' || $tag != ''){
            $data['articles'] = Article::with('author')->with('category')->with('tags')
                ->whereHas('tags', function (Builder $query) use ($tag) {
                    $query->where('tag_id', $tag);
                })
                ->where('title', 'like', '%'.$search.'%')
                ->orWhere('category_id', '=', $category)
                ->orderBy('id', 'desc')
                ->paginate(10);
        }
        else{
            $data['articles'] = Article::with('author')->with('category')->with('tags')->whereHas('tags')->orderBy('id', 'desc')->paginate(10);
        }

        $data['categories'] = Category::get();
        $data['tags'] = Tag::get();
        $data['title'] = "Article";
        $data['search'] = $search;
        return view('admin.articles.index', $data);
    }

    public function show(Article $id): Factory|View|Application
    {
        $data['title'] = "Cập nhật Article";
        $data['article'] = $id;
        $data['categories'] = Category::get();
        $data['tags'] = Tag::get();
        return view('admin.articles.show', $data);
    }

    //GET
    public function create(Request $request): Factory|View|Application
    {
        $data['title'] = "Thêm Article";
        $data['categories'] = Category::get();
        $data['tags'] = Tag::get();
        return view('admin.articles.create', $data);
    }

    //POST
    public function store(ArticleRequest $request): RedirectResponse
    {
        try {
            $article = Article::create([
                'author_id' => Auth::id(),
                'category_id' => $request->input('category_id'),
                'title' => $request->input('title'),
                'slug' => Str::of($request->input('input'))->slug('-'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'status' => $request->input('status'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            if($request->input('tag_id') != 0){
                DB::table('article_tag')->insert([
                    'article_id' => $article->id,
                    'tag_id' => $request->input('tag_id')
                ]);
            }
            Session::flash('success', 'Tạo mới article thành công');
            return redirect()->route('admin.article.index');
        }
        catch (\Exception $err){
            Session::flash('error', 'Tạo mới article thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    //GET
    public function edit(Article $id) {
        $data['title'] = "Cập nhật Article";
        $data['article'] = $id;
        $data['categories'] = Category::get();
        $data['tags'] = Tag::get();
        return view('admin.articles.edit', $data);
    }

    //POST
    public function update(ArticleRequest $request, Article $id) {
        try {
            $id->title = (string) $request->input('title');
            $id->category_id = $request->input('category_id');
            $id->slug = Str::of($request->input('title'))->slug('-');
            $id->description = $request->input('description');
            $id->content = $request->input('content');
            $id->status = $request->input('status');
            $id->updated_at = now();
            $id->save();

            if($request->input('tag_id') != 0){
                DB::table('article_tag')->where('article_id', $id->id)->where('tag_id', $id->tags[0]->id)->update([
                    'tag_id' => $request->input('tag_id')
                ]);
            }
            Session::flash('success', 'Cập nhật thông tin thành công');
            return redirect()->route('admin.article.index');
        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return redirect()->route('admin.article.edit');
        }
    }

    public function delete(Request $request) {
        $article = Article::where('id', $request->id);
        if($article){
            $article->delete();
            Session::flash('success', 'Xóa article thành công');
            return redirect()->route('admin.article.index');
        }
        Session::flash('error', 'Xóa article thất bại');
        return redirect()->route('admin.article.index');
    }

}