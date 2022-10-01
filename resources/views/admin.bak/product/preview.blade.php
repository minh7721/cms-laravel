@extends('admin.bak.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="card-body">
            <div class="form-group">
                <label for="">Tên bài viết</label>
                <input disabled type="text" name="name" value="{{ $product->name }}" class="form-control" id="name">
            </div>

            <div class="form-group">
                <label for="">Slug</label>
                <input disabled type="text" name="slug" value="{{ $product->slug }}" class="form-control" id="slug" >
            </div>

            <div class="form-group">
                <label for="">Người đăng</label>
                <input disabled type="text" name="userName" value="{{ $product->user->name }}" class="form-control" id="userName" >
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
        </div>

        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
