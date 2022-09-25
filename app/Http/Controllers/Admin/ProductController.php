<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Product\ProductService;
use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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
        $status = $request->status ?? "";
        $active = $status == 'active' ? 1 : 0 ;
        if($search != ""){
            $products = $this->productService->search($search);
        }
        else{
            $products = $this->productService->get();
        }
        $menus = $this->productService->getMenu();
        return view('admin.product.list',[
            'title' => 'Danh sách sản phẩm',
            'products' => $products,
            'menus' => $menus,
            'search' => $search,
            'category' => $category,
            'status' => $status
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.product.add', [
            'title' => 'Thêm sản phẩm mới',
            'menus' => $this->productService->getMenu()
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
            'title' => 'Cập nhật sản phẩm',
            'product' => $product,
            'menus' => $this->productService->getMenu()
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
                'message' => 'Xóa thành công sản phẩm'
            ]);
        }
        return response()->json(['error' => true]);
    }

    public function preview(Product $product){
        return view('admin.product.preview', [
            'title' => 'Chi tiết sản phẩm',
            'product' => $product,
            'menus' => $this->productService->getMenu()
        ]);
    }
}
