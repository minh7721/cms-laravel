<?php

namespace App\Http\Services\Admin\Slider;

use App\Models\Slider;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
/** @deprecated  */
class SliderService
{
    public function insert($request){
        try {
            Slider::create($request->input());
            Session::flash('success', 'Thêm slider thành công');
        }
        catch (\Exception $err){
            Session::flash('error', 'Thêm slider thất bại');
            Log::info($err->getMessage());
            return false;
        }

        return true;
    }
    public function get(){
        return Slider::orderByDesc('id')->paginate(20);
    }

    public function update($request, $slider){
        try {
            $slider->fill($request->input());
            $slider->save();
            Session::flash('success', 'Câp nhật slider thành công');
        }
        catch (\Exception $err){
            Session::flash('error', 'Câp nhật slider thất bại');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }

    public function delete($request){
        $slider = Slider::where('id', $request->input('id'))->first();
        if($slider){
            $path = str_replace('storage', 'public', $slider->thumb);
            Storage::delete($path);
            $slider->delete();
            return true;
        }
        return false;
    }

    public function search($search){
        return Slider::orderbyDesc('id')->where('name', 'like', '%'.$search.'%')->paginate(20);
    }
}
