<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
//        parent::__construct();
    }

    public function index(Request $request): Factory|View|Application
    {
        $search = $request->search ?? '';
        if($search != ''){
            $categories = Category::where('name', 'like', '%'.$search.'%')->paginate(10);
        }
        else{
            $categories = Category::paginate(10);
        }
        $data['title'] = "Categories";
        $data['categories'] = $categories;
        $data['search'] = $search;
        return view('admin.categories.index', $data);
    }

    public function show(Category $id): Factory|View|Application
    {
        $data['title'] = "Preview";
        $data['category'] = $id;
        $data['categories'] = Category::where('parent_id', 0)->get();
        return view('admin.categories.show', $data);
    }

    //GET
    public function create(Request $request): Factory|View|Application
    {
        $data['title'] = 'Add Categories';
        $data['categories'] = Category::where('parent_id', 0)->get();
        return view('admin.categories.create', $data);
    }

    //POST
    public function store(CategoryRequest $request): RedirectResponse
    {
        try {
            Category::create([
                'name' => (string) $request->input('name'),
                'parent_id' => $request->input('parent_id'),
                'slug' => Str::of($request->input('name'))->slug('-'),
                'description' => $request->input('description'),
                'content' => $request->input('content'),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            Session::flash('success', 'Tạo mới category thành công');
            return redirect()->route('admin.category.index');
        }
        catch (\Exception $err){
            Session::flash('error', 'Tạo mới category thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    //GET
    public function edit(Category $id) {
        $data['title'] = 'Edit category';
        $data['category'] = $id;
        $data['categories'] = Category::where('parent_id', 0)->get();
        return view('admin.categories.edit', $data);
    }

    //POST
    public function update(CategoryRequest $request, Category $id) {
        try {
            $id->name = (string) $request->input('name');
            $id->parent_id = (string) $request->input('parent_id');
            $id->updated_at = now();
            $id->fill($request->input());
            $id->save();
            Session::flash('success', 'Cập nhật thông tin thành công');
            return redirect()->route('admin.category.index');

        }
        catch (\Exception $err){
            Session::flash('error', 'Cập nhật thông tin thất bại');
            Log::info($err->getMessage());
            return redirect()->back();
        }
    }

    public function delete(Request $request) {
        $category = Category::where('id', $request->id);
        if($category){
            $category->delete();
            Session::flash('success', 'Xóa category thành công');
            return redirect()->route('admin.category.index');
        }
        Session::flash('error', 'Xóa categiry thất bại');
        return redirect()->route('admin.category.index');
    }

}
