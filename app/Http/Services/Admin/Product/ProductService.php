<?php

namespace App\Http\Services\Admin\Product;

use App\Models\Menu;
use App\Models\Product;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    public function getMenu(){
        return Menu::where('active', 1)->get();
    }

    protected function isValidPrice($request){
        if($request->input('price') != 0 && $request->input('price_sale') != 0
        && $request->input('price') <= $request->input('price_sale')){
            Session::flash('error', 'Giá giảm phải nhỏ hơn giá gốc');
            return false;
        }

        if($request->input('price') != 0 && (int) $request->input('price') == 0){
            Session::flash('error', 'Vui lòng nhập giá gốc');
            return false;
        }
        return true;
    }

    public function insert($request){
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice === false){
            return false;
        }
        try {
            $request->except('_token');
            Product::create($request->all());
            Session::flash('success', 'Thêm sản phẩm thành công');
        }
        catch (\Exception $err){
            Session::flash('error', 'Thêm sản phẩm thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function get(){
        return Product::with('menu')->orderByDesc('id')->paginate(10);
    }

    public function update($request, $product){
        $isValidPrice = $this->isValidPrice($request);
        if($isValidPrice === false){
            return false;
        }

        try {
            $product->fill($request->input());
            $product->save();
            Session::flash('success', 'Cập nhật thành công');
        }
        catch (\Exception $err){
            Session::flash('success', 'Cập nhật thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $product = Product::where('id', $request->input('id'))->first();
        if($product){
            $path = str_replace('storage', 'public', $product->thumb);
            Storage::delete($path);
            $product->delete();
            return true;
        }
        return false;
    }

    public function search($search){
        return Product::with('menu')->orderByDesc('id')->where('name', 'like', '%'.$search.'%')->paginate(20);
    }

    public function filter($category){
        return Product::with('menu')->orderByDesc('id')->where('menu_id', '=', $category)->paginate(20);
    }
}
