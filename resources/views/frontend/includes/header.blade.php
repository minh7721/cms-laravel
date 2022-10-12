<!-- Mobile menu -->
<div class="hidden mobile-menu float-left w-full mb-3">
    <ul class="">
        <li class="flex"><i id="btnCloseHeader" class="hidden fa-solid fa-xmark flex items-center py-4 px-2"></i>
            <p class="ml-3 px-2 py-4 text-sm font-bold">Review nhà</p>
        </li>
        <li class="active"><a href="#" class="block text-sm px-2 py-4 hover:text-mauDo">Mua nhà</a>
        </li>
        <li><a href="#" class="block text-sm px-2 py-4 hover:text-mauDo transition duration-300">Thuê
                nhà</a></li>
        <li><a href="#" class="block text-sm px-2 py-4 hover:text-mauDo transition duration-300">Khám
                phá</a></li>
        <li><a href="/" class="block text-sm px-2 py-4 hover:text-mauDo transition duration-300">Blog</a>
        </li>
        <li>
            <a href="#"
               class="pt-3 pb-3 flex justify-center text-sm font-semibold rounded-36px bg-mauDo bg- text-white hover:bg-mauDo hover:text-white transition duration-300">Đăng
                bài</a>
        </li>
        <li class="flex mt-9 w-full">
            <a class="w-1/2 pt-3 pb-3 flex justify-center text-sm font-semibold" href="#">Đăng nhập</a>
            <a href="#"
               class="ml-3 bg-mauChu w-1/2 flex justify-center text-sm text-white pt-3 pb-3 font-semibold rounded-36px">Đăng
                ký</a>
        </li>
    </ul>
</div>

<!-- PC -->

<div id="header" class="grid lg:grid-cols-3 grid-cols-2 gap-4 content-center leading-4">
    <div class="lg:hidden flex items-center w-8">
        <button class="outline-none mobile-menu-button">
            <svg class=" w-6 h-6 text-xanhLaDam hover:text-mauDo " x-show="!showMenu" fill="none" stroke-linecap="round"
                 stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                <path d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>
    <div class="header__left color__text lg:flex">
        <a href="" class="font__text text-sm opacity-50 ml-10">Home</a>
        <a href="" class="font__text text-sm opacity-50 ml-10">Lộ trình</a>
        <a href="" class="font__text text-sm opacity-50 ml-10">Khóa học</a>
        <a href="/" class="font__text text-sm text-mauDo ml-10 shrink underline decoration-1 underline-offset-8">
            Blog
        </a>
    </div>
    <div class="hidden lg:block lg:text-center md:text-left color__text font__text font-bold">Học lập trình để đi làm</div>
    <div class="navbar-right flex justify-end header__right flex-row md:w-full">
        <div class="icon-heart md:mr-6 sm:mr-1">
            <i class="fa-solid fa-heart-circle-check"></i>
        </div>

        @if(Auth::check() === false)
            <a href="{{ route('frontend.auth.login') }}" class="btn__dangBai mr-6 text-sm font-semibold pt-2 pb-2 pl-6 pr-6 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                Đăng nhập
            </a>
        @else
            <a href="{{ route('frontend.auth.logout') }}" class="btn__dangBai mr-6 text-sm font-semibold pt-2 pb-2 pl-6 pr-6 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">
                Đăng xuất
            </a>
        @endif
        <div class="profile flex">
            <div class="hidden lg:block profile-name">
                <div class="profile-name__name">{{ $user->name ?? 'Khách' }}</div>
                <div class="profile-name__job opacity-50 text-xs float-right font-normal">
                    @if(isset($user))
                        {{ $user->role_id == 3 ? 'User' : 'Admin'}}
                    @else
                        Khách vãng lai
                    @endif
                </div>
            </div>
            <div class="profile-avatar pl-2.5">
                <div class="dropdown">
                    <div class="" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <img src="{{ $user->thumb??'/template/images/blog/avatar.jpg' }}" alt="" class="rounded-full profile-avatar__img" />
                    </div>

                    @if(Auth::check() === true)
                        <div class="dropdown-menu mt-2" aria-labelledby="dropdownMenu">
                            <a class="dropdown-item py-2 fs-1" href="{{ route('frontend.user.profile') }}">Thông tin cá nhân</a>
                            <a class="dropdown-item py-2 fs-1" href="{{ route('frontend.user.changepass') }}">Đổi mật khẩu</a>
                            <a class="dropdown-item py-2 fs-1" href="{{ route('frontend.auth.logout') }}">Đăng xuất</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
