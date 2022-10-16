@extends('admin.auth.app')

@section('content')

    <div class="login-box">
        <h2>Login</h2>
        <form action="{{route('admin.auth.login')}}" method="post">
            @csrf
            <div class="user-box">
                <input id="email" type="email" name="email" class="@error('email') is-invalid @enderror"
                       value="{{ old('email') }}" required autofocus autocomplete="email">
                <label>Email</label>
            </div>
            <div class="user-box">
                <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required autocomplete="current-password">
                <label>Password</label>
            </div>
            <a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <button class="bg-transparent border-0" type="submit">Đăng nhập</button>
            </a>
        </form>
    </div>

{{--    <div class="login-box">--}}
{{--        <div class="card">--}}
{{--            <div class="card-body login-card-body">--}}
{{--                <h2 class="login-box-msg">{{ __('Login') }}</h2>--}}
{{--                <form action="{{route('admin.auth.login')}}" method="post">--}}
{{--                    @csrf--}}
{{--                    <div class="input-group mb-3">--}}
{{--                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"--}}
{{--                               value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autofocus autocomplete="email">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <div class="input-group-text">--}}
{{--                                <span class="fas fa-envelope"></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="input-group mb-3">--}}
{{--                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror"--}}
{{--                               placeholder="{{ __('Password') }}" required autocomplete="current-password">--}}
{{--                        <div class="input-group-append">--}}
{{--                            <div class="input-group-text">--}}
{{--                                <span class="fas fa-lock"></span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-4">--}}
{{--                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>--}}
{{--                        </div>--}}

{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
@endsection
