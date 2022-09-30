@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input disabled type="text" name="name" value="{{ $product->name }}" class="form-control" id="name" placeholder="Nhập tên sản phẩm">
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select disabled class="form-control" name="menu_id">
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
                    <input disabled type="number" name="price" class="form-control" id="price" value="{{$product->price}}" placeholder="Nhập giá gốc sản phẩm">
                </div>
                <div style="width: 49%;" class="form-group">
                    <label for="price_sale">Giá giảm</label>
                    <input disabled type="number" name="price_sale" class="form-control" value="{{$product->price_sale}}" id="price_sale" placeholder="Nhập giá sản phẩm sau giảm">
                </div>
            </div>
            <div class="form-group">
                <label>Mô tả Ngắn</label>
                <textarea disabled name="description" class="form-control">{{$product->description}}</textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <p>{!! $product->content !!}</p>
            </div>

            <div class="form-group">
                <label>Tag</label>
                <select disabled class="form-control" name="tag">
                    <option value="0">Tag</option>
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}" {{ $product->tag_id == $tag->id ? 'selected' : ''}}>{{$tag->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group w-50">
                <label>Ảnh bài viết</label>
                <div id="image_show">
                    <a href="{{$product->thumb}}" target="_blank">'
                        <img src="{{$product->thumb}}" width="100px;" alt="">
                    </a>
                </div>
            </div>

            <div class="form-group">
                <label>Trạng thái: </label>
                <p>{{$product->active == 0 ? 'Đang kích hoạt' : 'Chưa kích hoạt'}}</p>
            </div>
            <div class="form-group">
                <label>Chức năng</label>
                <a class="btn btn-primary btn-sm ml-3" href="/admin/product/edit/{{$product->id}}">
                    <i class="fa fa-edit"></i> sửa
                </a>
                <a href="" class="btn btn-danger btn-sm" onclick="removeRow({{$product->id}},'/admin/product/destroy/')">
                    <i class="fa fa-trash"></i> xóa
                </a>
            </div>
        </div>

        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
