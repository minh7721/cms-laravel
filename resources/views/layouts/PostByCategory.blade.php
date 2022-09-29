<!DOCTYPE html>
<html lang="en">

<head>
    @include('layouts.shared.head')
</head>

<body>
<div class="md:w-10/12 w-11/12 mx-auto">
    <!-- Start Header -->
    @include('layouts.shared.header')
    <!-- End Header -->

    <!-- Start Slider -->
    @include('layouts.shared.slider')
    <!-- End Slider -->

    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">
            <div class="flex justify-between truncate ">
                <a class="font-normal py-1.5 px-9" href="/">Tất cả</a>
                @foreach($menus as $menu)
                    <a class="font-normal py-1.5 px-9 {{ $menu->id == $menu_id ? ' bg-xanhLaDam rounded-36px text-white ' : '' }}" href="/category/{{ $menu->id }}">{{ $menu->name }}</a>
                @endforeach
            </div>

            <div class="mt-9 flex flex-col justify-center">
                @foreach($products as $key=> $product)
                    <a href="/{{$product->slug}}" class="flex flex-row sm:flex-col my-8">
                        <div class="w-full mr-6">
                            <img class="w-full rounded-36px" src="{{ $product->thumb }}" alt="">
                        </div>
                        <div class="flex flex-col w-full">
                            <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $product->name }}</p>
                            <div class="flex flex-row text-xs tracking-spaceChu">
                                <p class="text-xanhLaDam mr-2 text-base">{{ $product->menu->name }} •</p>
                                <p class="font-normal mr-2 text-base">Hoàng Minh •</p>
                                <p class="font-normal opacity-50 text-base">{{ $product->created_at }}</p>
                            </div>
                            <p class="font-normal opacity-50 text-base">{{ $product->description }}</p>
                        </div>
                    </a>
                @endforeach


                <div class="mt-20">
                    <div class="flex justify-center">
                        <button class="border-4 border-black border rounded-36px mb-10" style="width:200px; height: 50px;">
                            Xem thêm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    <div id="footer"></div>
    <!--End Footer  -->
</div>
@include('layouts.shared.footer')
</body>

</html>
