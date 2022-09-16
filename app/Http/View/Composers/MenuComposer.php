<?php

namespace App\Http\View\Composers;

use App\Models\Menu;
use Illuminate\View\View;

class MenuComposer
{
    protected $menu;
    public function __construct()
    {
    }

    public function compose(View $view)
    {
        $menus = Menu::select('id', 'name', 'parent_id', 'description', 'content', 'active')->where('active', 1)->orderByDesc('id')->get();
        $view->with('menus1', $menus);
    }
}
