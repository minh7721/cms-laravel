<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')

    <style>
        .form-control:focus {
            box-shadow: none;
            border-color: #BA68C8
        }

        .profile-button {
            background: rgb(99, 39, 120);
            box-shadow: none;
            border: none
        }

        .profile-button:hover {
            background: #682773
        }

        .profile-button:focus {
            background: #682773;
            box-shadow: none
        }

        .profile-button:active {
            background: #682773;
            box-shadow: none
        }

        .back:hover {
            color: #682773;
            cursor: pointer
        }

        .labels {
            font-size: 11px
        }

        .add-experience:hover {
            background: #BA68C8;
            color: #fff;
            cursor: pointer;
            border: solid 1px #BA68C8
        }
    </style>
</head>

<body>
<div class="md:w-10/12 w-11/12 mx-auto">
    <!-- Start Header -->
    @include('frontend.includes.header')
    <!-- End Header -->

    <!-- Start Content -->
    <div class="container">
        <div class="row">
            <a class="d-flex align-items-center" href="{{ route('frontend.main.index') }}">
                <i class="fa fa-chevron-left"></i>
                <p class="ml-2 mt-1">Trang chủ</p>
            </a>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Đổi mật khẩu') }}</div>

                    <form action="{{ route('frontend.user.updatePassword') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @elseif (session('error'))
                                <div class="alert alert-danger" role="alert">
                                    {{ session('error') }}
                                </div>
                            @endif

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Mật khẩu cũ</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                       placeholder="Mật khẩu cũ" value="{{ old('old_password') }}">
                                @error('old_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">Mật khẩu mới</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                       placeholder="Mật khẩu mới">
                                @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Nhập lại mật khẩu mới</label>
                                <input name="new_password_confirmation" type="password" class="form-control" id="confirmNewPasswordInput"
                                       placeholder="Nhập lại mật khẩu mới">
                            </div>

                        </div>

                        <div class="card-footer">
                            <button class="btn btn-success">Lưu thay đổi</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
{{--    End content--}}
</div>


<div id="footer"></div>
<!--End Footer  -->
@include('frontend.includes.footer')
</body>

</html>
