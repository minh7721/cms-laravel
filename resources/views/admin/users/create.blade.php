@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="form-group">
                <label for="menu">Tên</label>
                <input type="text" name="name" class="form-control" id="name" placeholder="Nhập tên user...">
            </div>

            <div class="form-group">
                <label for="menu">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="Nhập Email...">
            </div>

            <div class="form-group">
                <label for="menu">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Nhập Password...">
            </div>


{{--            <div class="form-group">--}}
{{--                <label for="menu">Confirm Password</label>--}}
{{--                <input type="password" name="password2" class="form-control" id="password2" placeholder="Nhập lại Password...">--}}
{{--            </div>--}}

            <div class="form-group">
                <label for="roleUser">Cấp bậc</label>
                <select class="form-control" id="roleUser" name="roleUser">
                    @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->name }}</option>
                    @endforeach
                </select>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm user</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace( 'content' );
    </script>
@endsection
