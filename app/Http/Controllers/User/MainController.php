<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Menu\MenuService;
use App\Http\Services\Admin\Product\ProductService;
use App\Models\Menu;
use App\Models\Product;
use Illuminate\Http\Request;

/** @deprecated  */
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
        $user = $request->user() ?? '';
        $menus = $this->menu->show();
        $products = $this->product->show();
        return view('layouts.main',[
            'title' => 'Trang chủ',
            'menus' => $menus,
            'products' => $products,
            'user' => $user,
        ]);
    }

    public function getByCategory(Request $request){
        $user = $request->user() ?? '';
        $menu_id = $request->category;
        $menus = $this->menu->show();
        $products = $this->product->getByCategory($menu_id);
        return view('layouts.PostByCategory',[
            'title' => 'Trang chủ',
            'menus' => $menus,
            'products' => $products,
            'menu_id' => $menu_id,
            'user' => $user,
        ]);
    }
    public function detail(Request $request){
        $user = $request->user() ?? '';
        $slug = $request->path();
        $product = $this->product->getDetail($slug);
        $menu_id = $product[0]->menu_id;
        $products = $this->product->getByCategory($menu_id);
        return view('layouts.detail', [
            'title' => 'Chi tiết bài viết',
            'product' => $product[0],
            'products' => $products,
            'user' => $user,
        ]);
    }
}
