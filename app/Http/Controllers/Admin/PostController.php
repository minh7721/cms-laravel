<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
/** @deprecated  */
class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:view,post')->only('show');
    }

    public function show(Post $post)
    {
        $this->authorize('view', $post);

        // Logic to show post
    }
}
