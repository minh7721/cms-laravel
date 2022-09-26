<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Tag\TagService;
use App\Models\Tag;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TagController extends Controller
{
    protected $tagService;

    public function __construct(TagService $tagService)
    {
        $this->tagService = $tagService;
    }

    public function index(Request $request){
        $search = $request->search ?? "";
        if($search != ""){
            $tags = $this->tagService->search($search);
        }
        else{
            $tags = $this->tagService->getAll();
        }
        return view('admin.tag.list', [
            'title' => 'Danh sách tags mới nhất',
            'tags' => $tags,
            'search' => $search
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.tag.add', [
            'title' => 'Thêm tag mới'
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'name' => 'required'
        ]);
        $result = $this->tagService->insert($request);
        if($result){
            return redirect('/admin/tag/list');
        }
        return redirect()->back();
    }

    public function show(Tag $tag)
    {
        return view('admin.tag.edit',[
            'title' => 'Cập nhật tag',
            'tag' => $tag,
        ]);
    }

    public function update(Request $request, Tag $tag)
    {
        $result = $this->tagService->update($request, $tag);
        if($result){
            return redirect('/admin/tag/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->tagService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công tag'
            ]);
        }
        return response()->json(['error' => true]);
    }

}
