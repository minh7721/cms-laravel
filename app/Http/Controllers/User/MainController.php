<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Services\Admin\Menu\MenuService;
use App\Http\Services\Admin\Product\ProductService;
use App\Models\Menu;
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
        $products = $this->menu->show();
        return view('layouts.main',[
            'title' => 'Trang chủ',
            'menus' => $menus,
            'products' => $products
        ]);
    }

    public function show(){

    }
}
