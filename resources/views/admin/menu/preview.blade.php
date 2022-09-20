@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên danh mục</label>
                <input disabled type="text" name="name" value="{{ $menu->name }}" class="form-control" id="name" placeholder="Nhập tên danh mục">
            </div>
            <div class="form-group">
                <label>Danh mục</label>
                <select class="form-control" name="parent_id" disabled>
                    <option value="0" {{$menu->parent_id == 0 ? 'selected' : ''}}>Danh mục cha</option>
                    @foreach($menus as $menuParent)
                        <option value="{{$menuParent->id}}"
                            {{ $menu->parent_id == $menuParent->id ? 'selected' : '' }}>
                            {{ $menuParent->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label>Mô tả Ngắn</label>
                <textarea disabled name="description" class="form-control">{{ $menu->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Mô tả chi tiết</label>
                <textarea disabled name="content" id="content" class="form-control">{{ $menu->content }}</textarea>
            </div>

            <div class="form-group">
                <label>Trạng thái: </label>
                <p>{{$menu->active == 0 ? 'Đang kích hoạt' : 'Chưa kích hoạt'}}</p>
            </div>
            <div class="form-group">
                <label>Chức năng</label>
                <a class="btn btn-primary btn-sm ml-3" href="/admin/menus/edit/{{$menu->id}}">
                    <i class="fa fa-edit"></i> sửa
                </a>
                <a href="" class="btn btn-danger btn-sm" onclick="removeRow({{$menu->id}},'/admin/menus/destroy/')">
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
