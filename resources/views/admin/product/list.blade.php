@php use App\Helpers\Helper; @endphp
@extends('admin.main')

@section('content')
    <div class="row mt-3">
        <div class="col-4">
            <a href="/admin/product/add" class="btn btn-primary d-flex justify-content-center align-self-center col-2 ml-3" style="height: 45px;">
                <p>Thêm</p>
            </a>
        </div>
        <form action="" class="d-flex justify-content-end col-8">
            <div class="form-group">
                <input value="{{ $search }}" type="search" name="search" id="" class="form-control" style="height: 44px;" placeholder="Nhập tên danh mục cần tìm">
            </div>
            <button class="btn btn-primary ml-3" style="height: 44px;">Search</button>
        </form>
    </div>
    <form action="" method="GET">
        <div class="row p-2 mb-3 d-flex align-items-center">
            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle ml-3" href="" style="height: 45px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc theo danh mục
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($menus as $key=>$menu)
                        <a class="dropdown-item" href="?category={{ $menu->id }}">{{ $menu->name }}</a>
                    @endforeach
                </div>
            </div>

            <div class="dropdown show">
                <a class="btn btn-secondary dropdown-toggle ml-3" href="" style="height: 45px;" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Lọc theo tag
                </a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    @foreach($tags as $key=>$tag)
                        <a class="dropdown-item" href="?tag={{ $tag->id }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </form>
    <table class="table table-hover text-wrap">
        <thead>
        <tr>
            <th class="col-1" style="width: 50px;">ID</th>
            <th class="col-2">Tên bài viết</th>
            <th class="col-1">Người đăng</th>
            <th class="col-1">Danh mục</th>
            <th class="col-3">Mô tả</th>
            <th class="col-1">Hình ảnh</th>
            <th>Tag</th>
            <th>Active</th>
            <th class="col-1">Update at</th>
            <th style="width: 150px;">Option</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $key => $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->user->name}}</td>
                <td>{{$product->menu->name}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <a href="{{$product->thumb}}" target="_blank">
                        <img src="{{$product->thumb}}" style="width: 50px;">
                    </a>
                </td>
                <td>{{ $product->tag->name }}</td>
                <td>{!! Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="/admin/product/preview/{{$product->id}}">
                        <i class="fa fa-eye"></i>
                    </a>

                    @if( $role == 1)
                        <a  class="btn btn-primary btn-sm" href="/admin/product/edit/{{$product->id}}">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="" class="btn btn-danger btn-sm"
                           onclick="removeRow({{$product->id}}, '/admin/product/destroy/')">
                            <i class="fa fa-trash"></i>
                        </a>
                    @elseif($role == 2)
                        @if($currentUser == $product->user_id)
                            <a  class="btn btn-primary btn-sm" href="/admin/product/edit/{{$product->id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="" class="btn btn-danger btn-sm"
                               onclick="removeRow({{$product->id}}, '/admin/product/destroy/')">
                                <i class="fa fa-trash"></i>
                            </a>

                            @elseif($currentUser != $product->user_id)
                            <a  class="disabled btn btn-primary btn-sm" href="/admin/product/edit/{{$product->id}}">
                                <i class="fa fa-edit"></i>
                            </a>
                            <a href="" class="disabled btn btn-danger btn-sm"
                               onclick="removeRow({{$product->id}}, '/admin/product/destroy/')">
                                <i class="fa fa-trash"></i>
                            </a>
                            @endif
                    @endif
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $products->appends(request()->all())->links() !!}
@endsection
