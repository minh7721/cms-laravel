@extends('admin.main')

@section('content')
    <div class="row mt-3">
        <div class="col-4">
            <a href="/admin/menus/add" class="btn btn-primary d-flex justify-content-center align-self-center col-2" style="height: 45px;">
                <p>Thêm</p>
            </a>
        </div>
        <form action="" class="d-flex justify-content-end col-8">
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
                <th>Tên</th>
                <th>Danh mục cha</th>
                <th>Mô tả</th>
                <th>slug</th>
                <th>Active</th>
                <th>Update</th>
                <th style="width: 150px;">Option</th>
            </tr>
        </thead>
        <tbody>
            {!! \App\Helpers\Helper::menu($menus) !!}
        </tbody>
    </table>

    {!! $menus->appends(request()->all())->links() !!}
@endsection
