<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Admin\Menu\MenuService;
use App\Models\Menu;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/** @deprecated  */
class MenuController extends Controller
{
    protected $menuService;

    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    public function index(Request $request): Factory|View|Application
    {
        $search = $request->search ?? "";
        if($search != ""){
          $menus = $this->menuService->search($search);
        }
        else{
            $menus = $this->menuService->getAll();
        }
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục mới nhất',
            'menus' => $menus
        ]);
    }

    public function create(): Factory|View|Application
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục mới',
            'menus' => $this->menuService->getParent()
        ]);
    }

    public function store(CreateFormRequest $request): RedirectResponse
    {
        $result = $this->menuService->create($request);
        if($result){
            return redirect('/admin/menus/list');
        }
        return redirect()->back();
    }

    public function show(Menu $menu){
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục',
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }


    public function destroy(Request $request): JsonResponse
    {
        $result = $this->menuService->destroy($request);
        if ($result) {
            return response()->json([
                'error' => false,
                'message' => 'Xóa thành công danh mục'
            ]);
        }

        return response()->json([
            'error' => true,
            'message' => 'Xóa thành công danh mục'
        ]);
    }

    public function update(Menu $menu, CreateFormRequest $request){
        $result = $this->menuService->update($request, $menu);
        if($result){
            return redirect('/admin/menus/list');
        }
        return redirect()->back();
    }

    public function preview(Menu $menu){
        return view('admin.menu.preview', [
            'title' => 'Chi tiết danh mục',
            'menu' => $menu,
            'menus' => $this->menuService->getParent()
        ]);
    }
}
