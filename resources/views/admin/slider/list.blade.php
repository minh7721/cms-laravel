@php use App\Helpers\Helper; @endphp
@extends('admin.main')

@section('content')
    <div class="row mt-3">
        <div class="col-4">
            <a href="/admin/slider/add" class="btn btn-primary d-flex justify-content-center align-self-center col-2" style="height: 45px;">
                <p>Thêm</p>
            </a>
        </div>
        <form action="" class="d-flex justify-content-end col-12">
            <select>
                <option></option>
            </select>
            <div class="form-group">
                <input type="search" name="search" id="" class="form-control" style="height: 44px;" placeholder="Nhập tên danh mục cần tìm">
            </div>
            <button class="btn btn-primary ml-3" style="height: 44px;">Search</button>
        </form>
    </div>

    <table class="table table-hover text-wrap">
        <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tiêu đề ảnh</th>
            <th>Url</th>
            <th>Hình ảnh</th>
            <th>Sắp xếp</th>
            <th>Active</th>
            <th>Update at</th>
            <th style="width: 150px;">Option</th>
        </tr>
        </thead>
        <tbody>

        @foreach($sliders as $key => $slider)
            <tr>
                <td>{{$slider->id}}</td>
                <td>{{$slider->name}}</td>
                <td>{{$slider->url}}</td>
                <td>
                    <a>
                        <img src="{{$slider->thumb}}" style="height: 60px;">
                    </a>
                </td>
                <td>{{$slider->sort_by}}</td>
                <td>{!! Helper::active($slider->active) !!}</td>
                <td>{{$slider->updated_at}}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="/admin/slider/preview/{{$slider->id}}">
                        <i class="fa fa-eye"></i>
                    </a>
                    <a class="btn btn-primary btn-sm" href="/admin/slider/edit/{{$slider->id}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$slider->id}}, '/admin/slider/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $sliders->appends(request()->all())->links() !!}
@endsection
