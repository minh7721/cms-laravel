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

    <!-- Start Slider -->
    @include('layouts.shared.slider')
    <!-- End Slider -->

    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tên bài viết</label>
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
                    <div class="row d-flex justify-content-between">
                        <div style="width: 49%;" class="form-group">
                            <label for="price">Giá gốc</label>
                            <input type="number" name="price" class="form-control" id="price" value="{{old('price')}}" placeholder="Nhập giá gốc bài viết">
                        </div>
                        <div style="width: 49%;" class="form-group">
                            <label for="price_sale">Giá giảm</label>
                            <input type="number" name="price_sale" class="form-control" value="{{old('price_sale')}}" id="price_sale" placeholder="Nhập giá bài viết sau giảm">
                        </div>
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
                            <input class="custom-control-input" value="1" type="radio" id="active" name="active">
                            <label for="active" class="custom-control-label">Có</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" checked="">
                            <label for="no_active" class="custom-control-label">Không</label>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Tạo bài viết</button>
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
