<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Admin\Product\ProductService;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $search = $request->search ?? "";
        $category = $request->category ?? 0;
        $tag = $request->tag ?? 0;
        if($search != ""){
            $products = $this->productService->search($search);
        }
        elseif($category != 0){
            $products = $this->productService->filter($category);
        }
        elseif($tag != 0){
            $products = $this->productService->filterTag($tag);
        }
        else{
            $products = $this->productService->get();
        }

        $role = DB::table('role_user')->where('user_id', Auth::id())->get();
        $currentUser = Auth::id();

        $menus = $this->productService->getMenu();
        $tags = $this->productService->getTag();
        return view('admin.product.list',[
            'title' => 'Danh sách bài viết',
            'products' => $products,
            'menus' => $menus,
            'search' => $search,
            'category' => $category,
            'tags' => $tags,
            'role' => $role[0]->role_id,
            'currentUser' => $currentUser
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.product.add', [
            'title' => 'Thêm bài viết mới',
            'menus' => $this->productService->getMenu(),
            'tags' => $this->productService->getTag()
        ]);

    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $result = $this->productService->insert($request);
        if($result){
            return redirect('/admin/product/list');
        }
        return redirect()->back();
    }

    public function show(Product $product)
    {
        return view('admin.product.edit',[
            'title' => 'Cập nhật bài viết',
            'product' => $product,
            'menus' => $this->productService->getMenu(),
            'tags' => $this->productService->getTag(),
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $result = $this->productService->update($request, $product);
        if($result){
            return redirect('/admin/product/list');
        }
        return redirect()->back();
    }


    public function destroy(Request $request)
    {
        $result = $this->productService->delete($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công bài viết'
            ]);
        }
        return response()->json(['error' => true]);
    }

    public function preview(Product $product){
        $role = DB::table('role_user')->where('user_id', Auth::id())->get();
        $currentUser = Auth::id();

        return view('admin.product.preview', [
            'title' => 'Chi tiết bài viết',
            'product' => $product,
            'menus' => $this->productService->getMenu(),
            'tags' => $this->productService->getTag(),
            'role' => $role[0]->role_id,
            'currentUser' => $currentUser
        ]);
    }
}
