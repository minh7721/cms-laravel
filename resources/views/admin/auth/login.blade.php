@extends('admin.auth.app')

@section('content')
    <div class="login-box">
        <div class="card">
            <div class="card-body login-card-body">
                <h2 class="login-box-msg">{{ __('Login') }}</h2>
                <form action="{{route('admin.auth.login')}}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="{{ __('Email Address') }}" required autofocus autocomplete="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="{{ __('Password') }}" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        </div>

                    </div>
                </form>
{{--                <div class="social-auth-links text-center mb-3">--}}
{{--                    <p>- OR -</p>--}}
{{--                    <a href="#" class="btn btn-block btn-primary">--}}
{{--                        <i class="fab fa-facebook mr-2"></i> Sign in using Facebook--}}
{{--                    </a>--}}
{{--                    <a href="#" class="btn btn-block btn-danger">--}}
{{--                        <i class="fab fa-google-plus mr-2"></i> Sign in using Google+--}}
{{--                    </a>--}}
{{--                </div>--}}

{{--                <p class="mb-1">--}}
{{--                    <a href="forgot-password.html">I forgot my password</a>--}}
{{--                </p>--}}
{{--                <p class="mb-0">--}}
{{--                    <a href="register.html" class="text-center">Register a new membership</a>--}}
{{--                </p>--}}
            </div>

        </div>
    </div>
@endsection
