@extends('admin.main')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input disabled type="text" name="name" value="{{$slider->name}}" class="form-control" id="name" placeholder="Nhập tiêu đề hình ">
            </div>
            <div class="form-group">
                <label for="">Đường dẫn</label>
                <input disabled type="text" name="url" class="form-control" id="url" value="{{$slider->url}}" placeholder="ĐƯờng dẫn hình ảnh">
            </div>

            <div class="form-group w-50">
                <label>Hình ảnh</label>
                <div id="image_show">
                    <a href="{{$slider->thumb}}">
                        <img src="{{$slider->thumb}}" style="width: 100px;">
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label for="">Sắp xếp</label>
                <input disabled type="number" name="sort_by" class="form-control" id="sort_by" value="{{$slider->sort_by}}" placeholder="Sắp xếp...">
            </div>

            <div class="form-group">
                <label>Trạng thái: </label>
                <p>{{$slider->active == 0 ? 'Đang kích hoạt' : 'Chưa kích hoạt'}}</p>
            </div>
            <div class="form-group">
                <label>Chức năng</label>
                <a class="btn btn-primary btn-sm ml-3" href="/admin/slider/edit/{{$slider->id}}">
                    <i class="fa fa-edit"></i> sửa
                </a>
                <a href="" class="btn btn-danger btn-sm" onclick="removeRow({{ $slider->id }},'/admin/slider/destroy/')">
                    <i class="fa fa-trash"></i> xóa
                </a>
            </div>
        </div>
        <!-- /.card-body -->
        @csrf
    </form>
@endsection
