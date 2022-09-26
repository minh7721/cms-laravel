<?php

namespace App\Http\Services\Admin\Tag;

use App\Models\Tag;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TagService
{
    public function getAll(){
        return Tag::orderbyDesc('id')->paginate(20);
    }
    public function search($search){
        return Tag::orderbyDesc('id')->where('name', 'like', '%'.$search.'%')->paginate(20);
    }

    public function insert($request){
        try {
            $request->except('_token');
            Tag::create([
                'name' => (string) $request->input('name'),
                'tag' => Str::of($request->input('name'))->slug('-'),
                'active' => (string) $request->input('active'),
            ]);
            Session::flash('success', 'Thêm tag thành công');
        }
        catch (\Exception $err){
            Session::flash('error', 'Thêm tag thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function update($request, $product){
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
        $tag = Tag::where('id', $request->input('id'))->first();
        if($tag){
            $tag->delete();
            return true;
        }
        return false;
    }

}
