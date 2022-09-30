
<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{$title}}</title>
    @include('admin.head')
</head>
<body class="hold-transition register-page">
<div class="register-box">
    <div class="register-logo">
        <a href=""><b>Đăng ký</b></a>
    </div>

    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Đăng ký ngay tài khoản mới</p>
            @include('admin.alert')
            <form action="/auth/register/create" method="post">
                <div class="input-group mb-3">
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Tên của bạn...">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" value="{{ old('password') }}" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password_confirm" value="{{ old('password_confirm') }}" class="form-control" placeholder="Nhập lại password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
{{--                    <div class="col-8">--}}
{{--                        <div class="icheck-primary">--}}
{{--                            <input type="checkbox" id="agreeTerms" name="terms" value="agree">--}}
{{--                            <label for="agreeTerms">--}}
{{--                                Thông tin hoàn toàn <a href="#">chính xác</a>--}}
{{--                            </label>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <!-- /.col -->
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary btn-block mb-3">Register</button>
                    </div>
                    <!-- /.col -->
                </div>
                @csrf
            </form>

{{--            <div class="social-auth-links text-center">--}}
{{--                <p>- OR -</p>--}}
{{--                <a href="#" class="btn btn-block btn-primary">--}}
{{--                    <i class="fab fa-facebook mr-2"></i>--}}
{{--                    Sign up using Facebook--}}
{{--                </a>--}}
{{--                <a href="#" class="btn btn-block btn-danger">--}}
{{--                    <i class="fab fa-google-plus mr-2"></i>--}}
{{--                    Sign up using Google+--}}
{{--                </a>--}}
{{--            </div>--}}

            <a href="/auth/login" class="text-center">Đăng nhập ngay</a>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->
@include('admin.footer')

</body>
</html>
