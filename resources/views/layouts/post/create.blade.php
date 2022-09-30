<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.shared.head')
</head>

<body>
<div class="md:w-10/12 w-11/12 mx-auto">
    <!-- Start Header -->
    @include('layouts.shared.header')
    <!-- End Header -->

    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label>Tên bài viết</label>
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" placeholder="Nhập tên bài viết">
                    </div>
                    <div class="form-group">
                        <label>Danh mục</label>
                        <select class="form-control" name="menu_id">
                            <option value="0">Danh mục cha</option>
                            @foreach($menus as $menu)
                                <option value="{{$menu->id}}">{{$menu->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Mô tả Ngắn</label>
                        <textarea name="description" class="form-control">{{old('description')}}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Mô tả chi tiết</label>
                        <textarea name="content" id="content" class="form-control">{{old('content')}}</textarea>
                    </div>

                    <div class="form-group">
                        <label>Tag</label>
                        <select class="form-control" name="tag">
                            <option value="0">Tag</option>
                            @foreach($tags as $tag)
                                <option value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group w-50">
                        <label>Ảnh bài viết</label>
                        <input type="file" class="form-control" id="upload">
                        <div id="image_show">

                        </div>
                        <input type="hidden" name="thumb" id="thumb">
                    </div>

                    <div class="form-group">
                        <label>Kích hoạt</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" value="1" type="radio" id="active" name="active" checked="">
                            <label for="customRadio4" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input custom-control-input-danger" value="0" type="radio" id="no_active" name="active">
                            <label for="customRadio4" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="ml-3">
                    <button type="submit" class="btn btn-outline-danger">Tạo bài viết</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    <div id="footer"></div>
    <!--End Footer  -->
</div>
@include('layouts.shared.footer')

</body>

</html>
