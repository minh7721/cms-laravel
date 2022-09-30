<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $post;

    public function __construct(Product $product)
    {
        $this->post = $product;
    }

    public function create(){
        return view('layouts.post.create',[
            'title' => 'Đăng bài mới'
        ]);
    }
}
