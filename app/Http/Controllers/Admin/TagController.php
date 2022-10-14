<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TagRequest;
use App\Libs\StringUtils;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TagController extends Controller
{
    public function __construct()
    {
//        parent::__construct();
    }

    public function index(Request $request): Factory|View|Application
    {
        $search = $request->search ?? '';
        if($search != ''){
            $tags = Tag::where('name', 'like', '%'.$search.'%')->paginate(10);
        }
        else{
            $tags = Tag::paginate(10);
        }
        $data['title'] = "Tags";
        $data['tags'] = $tags;
        $data['search'] = $search;
        return view('admin.tags.index', $data);
    }

    public function show(Tag $id): Factory|View|Application
    {
        $data['title'] = "Preview";
        $data['tag'] = $id;
        return view('admin.tags.show', $data);
    }

    //GET
    public function create(Request $request): Factory|View|Application
    {
        $data['title'] = 'Add tag';
        return view('admin.tags.create', $data);
    }

    //POST
    public function store(TagRequest $request): RedirectResponse
    {
        try {
            Tag::create([
                'name' => (string) $request->input('name'),
                'slug' => Str::of($request->input('name'))->slug('-'),
                'length' => StringUtils::wordsCount($request->input('name')),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Session::flash('success', 'Tạo mới tag thành công');
            return redirect()->route('admin.tag.index');
        }
        catch (\Exception $err){
            Session::flash('error', 'Tạo mới tag thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    //GET
    public function edit(Tag $id) {
        $data['title'] = 'Edit tag';
        $data['tag'] = $id;
        return view('admin.tags.edit', $data);
    }

    //POST
    public function update(TagRequest $request, Tag $id) {
        try {
            $id->name = (string) $request->input('name');
            $id->slug = Str::of($request->input('name'))->slug('-');
            $id->length = StringUtils::wordsCount($request->input('name'));
            $id->updated_at = now();
            $id->fill($request->input());
            $id->save();
            Session::flash('success', 'Cập nhật thông tin thành công');
            return redirect()->route('admin.tag.index');

        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    public function delete(Request $request): RedirectResponse
    {
        $tag = Tag::where('id', $request->id);
        if($tag){
            $tag->delete();
            DB::table('article_tag')->where('tag_id', $request->id)->delete();
            Session::flash('success', 'Xóa tag thành công');
            return redirect()->route('admin.tag.index');
        }
        Session::flash('error', 'Xóa category thất bại');
        return redirect()->route('admin.tag.index');
    }
}
