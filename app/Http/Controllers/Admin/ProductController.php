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
use Illuminate\Http\Response;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return view('admin.product.list',[
            'title' => 'Danh sách sản phẩm',
            'products' => $this->productService->get()
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
}
