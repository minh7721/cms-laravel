@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="name" value="{{ $product->name }}" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="menu_id">
                    <option value="0">Danh mục cha</option>
                    @foreach($menus as $menu)
                        <option value="{{$menu->id}}" {{ $product->menu_id == $menu->id ? 'selected' : ''}}>
                            {{$menu->name}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="row d-flex justify-content-between">
                <div style="width: 49%;" class="form-group">
                    <label for="price">Giá gốc</label>
                    <input type="number" name="price" class="form-control" id="price" value="{{$product->price}}" placeholder="Nhập giá gốc sản phẩm">
                </div>
                <div style="width: 49%;" class="form-group">
                    <label for="price_sale">Giá giảm</label>
                    <input type="number" name="price_sale" class="form-control" value="{{$product->price_sale}}" id="price_sale" placeholder="Nhập giá sản phẩm sau giảm">
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả Ngắn</label>
                <textarea name="description" class="form-control">{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea name="content" id="content" class="form-control">{{$product->content}}</textarea>
            </div>

            <div class="form-group">
                <label>Tag</label>
                <select class="form-control" name="tag">
                    <option value="0">Tag</option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}" {{ $product->tag_id == $tag->id ? 'selected' : ''}}>{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>


            <div class="form-group w-50">
                <label>Ảnh sản phẩm</label>
                <input type="file" class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{$product->thumb}}" target="_blank">'
                        <img src="{{$product->thumb}}" width="100px;" alt="">
                    </a>
                </div>
                <input type="hidden" name="thumb" id="thumb" value="{{$product->thumb}}">
            </div>

            <div class="form-group">
                <label>Kích hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{$product->active == 1 ? 'checked' : ''}}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{$product->active == 0 ? 'checked' : ''}}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>
        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập nhật danh mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
