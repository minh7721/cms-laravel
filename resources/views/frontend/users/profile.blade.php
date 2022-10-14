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
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="row">
            <a class="d-flex align-items-center" href="{{ route('frontend.main.index') }}">
                <i class="fa fa-chevron-left"></i>
                <p class="ml-2 mt-1">Trang chủ</p>
            </a>
        </div>
        <form action="{{ route('frontend.user.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-3 border-right">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center p-3 py-5">
                        <img class="rounded-circle mt-5" style="width: 250px; height: 250px;"
                             src="{{ $user-> thumb}}"
                             alt="Avatar">
                        <span class="font-weight-bold">{{ $user->name }}</span>
                        <span class="text-black-50">{{ $user->email }}</span>
                        <input type="file" id="upload" name="avatar" class="form-control">
                        <input type="hidden" name="thumb" id="thumb">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="p-3 py-5">
                        @include('frontend.includes.alert')
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h4 class="text-right">Thông tin cá nhân</h4>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-12">
                                <label class="labels">Họ và tên</label>
                                <input type="text" name="name" class="form-control" placeholder="Tên của bạn" value="{{ $user->name }}">
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <label class="labels">Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email của bạn..." value="{{ $user->email }}">
                            </div>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-outline-danger" type="submit">Lưu thay đổi</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


<div id="footer"></div>
<!--End Footer  -->

@include('frontend.includes.footer')

</body>

</html>
