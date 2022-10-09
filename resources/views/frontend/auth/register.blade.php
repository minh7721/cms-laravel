<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập</title>
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
        rel="stylesheet"
    />

    <style>
        .gradient-custom-3 {
            /* fallback for old browsers */
            background: #84fab0;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
        }
        .gradient-custom-4 {
            /* fallback for old browsers */
            background: #84fab0;

            /* Chrome 10-25, Safari 5.1-6 */
            background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

            /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
            background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
        }
    </style>
</head>
<body>

<section class="vh-100 bg-image"
         style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Đăng ký tài khoản</h2>
                            @include('frontend.includes.alert')
                            <form action="{{ route('frontend.auth.registration') }}" method="post">
                                @csrf

                                <div class="form-outline mt-4 mb-1">
                                    <input type="text" id="name" name="name" class="form-control form-control-lg @error('name') is-invalid @enderror" value="{{ old('name') }}"/>
                                    <label class="form-label" for="name">Họ tên</label>
                                </div>
                                @error('name')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-outline mt-4 mb-1">
                                    <input type="email" name="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" value="{{ old('email') }}"/>
                                    <label class="form-label" for="email">Email</label>
                                </div>
                                @error('email')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-outline mt-4 mb-1">
                                    <input type="password" name="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror"/>
                                    <label class="form-label" for="password">Mật khẩu</label>
                                </div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-outline mt-4 mb-1">
                                    <input type="password" name="password_confirmation" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" />
                                    <label class="form-label" for="password_confirm">Nhập lại mật khẩu</label>
                                </div>
                                @error('password')
                                <span class="text-danger">{{ $message }}</span>
                                @enderror

                                <div class="form-check d-flex justify-content-center mt-4 mb-5">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                                    <label class="form-check-label" for="form2Example3g">
                                         Tôi đồng ý với <a href="" class="text-body"><u>điều khoản</u></a>
                                    </label>
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Đăng ký</button>
                                </div>

                                <p class="text-center text-muted mt-5 mb-0">Đã có tài khoản? <a href="{{ route('frontend.auth.login') }}" class="fw-bold text-body"><u>Đăng nhập ở đây :)</u></a></p>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- MDB -->
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
</body>
</html>

