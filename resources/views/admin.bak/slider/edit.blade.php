@extends('admin.bak.main')

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tiêu đề</label>
                <input type="text" name="name" value="{{$slider->name}}" class="form-control" id="name" placeholder="Nhập tiêu đề hình ">
            </div>
            <div class="form-group">
                <label for="">Đường dẫn</label>
                <input type="text" name="url" class="form-control" id="url" value="{{$slider->url}}" placeholder="ĐƯờng dẫn hình ảnh">
            </div>

            <div class="form-group w-50">
                <label>Hình ảnh</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{$slider->thumb}}">
                        <img src="{{$slider->thumb}}" style="width: 100px;">
                    </a>
                </div>
                <input value="{{$slider->thumb}}" type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label for="">Sắp xếp</label>
                <input type="number" name="sort_by" class="form-control" id="sort_by" value="{{$slider->sort_by}}" placeholder="Sắp xếp...">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                    {{$slider->active == 1 ? 'checked' : ''}}
                    >
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{$slider->active == 0 ? 'checked' : ''}}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật slider</button>
        </div>
        @csrf
    </form>
@endsection
