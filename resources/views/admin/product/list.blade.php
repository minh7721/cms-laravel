@php use App\Helpers\Helper; @endphp
@extends('admin.main')

@section('content')
    <div class="row mt-3">
        <div class="col-4">
            <a href="/admin/product/add" class="btn btn-primary d-flex justify-content-center align-self-center col-2" style="height: 45px;">
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
        <div class="row mt-1 ml-1 d-flex align-items-center">
               <select name="category" class="form-select p-2 mb-3" aria-label="Default select example">
                   <option value="0" selected>Lọc theo danh mục</option>
                   @foreach($menus as $key=>$menu)
                       <option {{ $category == $menu->id ? 'selected' : ''}} value="{{$menu->id}}">{{$menu->name}}</option>
                   @endforeach
               </select>

                <select name="status" class="form-select p-2 mb-3 ml-3" aria-label="Default select example">
                    <option value="0">Trạng thái</option>
                    <option {{ $status == 'active' ? 'selected' : '' }} value="active">Kích hoạt</option>
                    <option {{ $status == 'inactive' ? 'selected' : '' }} value="inactive">Chưa kích hoạt</option>
                </select>

            <button class="btn btn-primary mb-3 ml-3 p-2" style="width: 80px;">Lọc</button>
        </div>
    </form>
    <table>
        <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Mô tả</th>
            <th>Hình ảnh</th>
            <th>Giá gốc</th>
            <th>Giá khuyến mãi</th>
            <th>Active</th>
            <th>Update at</th>
            <th style="width: 150px;">Active</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $key => $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->menu->name}}</td>
                <td>{{$product->description}}</td>
                <td>
                    <a href="{{$product->thumb}}" target="_blank">
                        <img src="{{$product->thumb}}" style="width: 50px;">
                    </a>
                </td>
                <td>{{$product->price}}</td>
                <td>{{$product->price_sale}}</td>
                <td>{!! Helper::active($product->active) !!}</td>
                <td>{{$product->updated_at}}</td>
                <td>
                    <a class="btn btn-warning btn-sm" href="/admin/product/preview/{{$product->id}}">
                        <i class="fa fa-eye"></i>
                    </a>

                    <a class="btn btn-primary btn-sm" href="/admin/product/edit/{{$product->id}}">
                        <i class="fa fa-edit"></i>
                    </a>
                    <a href="" class="btn btn-danger btn-sm"
                       onclick="removeRow({{$product->id}}, '/admin/product/destroy/')">
                        <i class="fa fa-trash"></i>
                    </a>
                </td>

            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $products->appends(request()->all())->links() !!}
@endsection
