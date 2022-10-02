<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\ProductRequest;
use App\Http\Services\Admin\Product\ProductService;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/** @deprecated  */
class PostController extends Controller
{
    protected $post;

    public function __construct(ProductService $product,)
    {
        $this->post = $product;
    }

    public function create(){
        return view('layouts.post.create',[
            'title' => 'Đăng bài mới',
            'menus' => $this->post->getMenu(),
            'tags' => $this->post->getTag()
        ]);
    }

    public function store(ProductRequest $request): RedirectResponse
    {
        $result = $this->post->insert($request);
        if($result){
            return redirect()->back();
        }
        return redirect()->back();
    }
}
