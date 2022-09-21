@php use App\Helpers\Helper; @endphp
@extends('admin.main')

@section('content')
    <div class="row mt-3">
        <form action="" class="d-flex justify-content-end col-12">
            <div class="form-group">
                <input type="search" name="search" id="" class="form-control" style="height: 44px;" placeholder="Nhập tên danh mục cần tìm">
            </div>
            <button class="btn btn-primary ml-3" style="height: 44px;">Search</button>
        </form>
    </div>

    <table>
        <thead>
        <tr>
            <th style="width: 50px;">ID</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Giá gốc</th>
            <th>Giá khuyến mãi</th>
            <th>Active</th>
            <th>Update at</th>
            <th style="width: 150px;">&nbsp;</th>
        </tr>
        </thead>
        <tbody>

        @foreach($products as $key => $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->menu->name}}</td>
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
