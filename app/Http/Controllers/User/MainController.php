<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Menu\MenuService;
use App\Http\Services\Admin\Product\ProductService;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    protected $menu;
    protected $product;

    public function __construct(MenuService $menu, ProductService $product)
    {
        $this->menu = $menu;
        $this->product = $product;
    }

    public function index(Request $request){
        $menus = $this->menu->show();
        $products = $this->product->show();
        return view('layouts.main',[
            'title' => 'Trang chủ',
            'menus' => $menus,
            'products' => $products
        ]);
    }

    public function getByCategory(Request $request){
        $menu_id = $request->category;
        $menus = $this->menu->show();
        $products = $this->product->getByCategory($menu_id);
        return view('layouts.PostByCategory',[
            'title' => 'Trang chủ',
            'menus' => $menus,
            'products' => $products,
            'menu_id' => $menu_id
        ]);
    }
    public function detail(Request $request){
        $slug = $request->path();
        $product = $this->product->getDetail($slug);
        return view('layouts.detail', [
            'title' => 'Chi tiết bài viết',
            'product' => $product[0]
        ]);
    }
}
