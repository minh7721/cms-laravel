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
                <a class="bg-xanhLaDam rounded-36px font-normal text-white py-1.5 px-9" href="/">Tất cả</a>
                @foreach($menus as $menu)
                      <a class="font-normal py-1.5 px-9" href="/category/{{ $menu->id }}">{{ $menu->name }}</a>
                @endforeach
            </div>

            <div class="flex justify-center mt-11">
                <i class="fa-solid fa-square-rss text-xanhLaDam text-4xl mr-8"></i>
                <p class="text-4xl">Tin tức</p>
            </div>
            <div class="mt-8">
                <div class="flex justify-center items-center">
                    <div class="grid lg:grid-flow-col grid-flow-row grid-cols-10 gap-4 justify-items-center">
                        <a href="/{{ $products[0]->slug }}" class="row-span-4 col-span-12 lg:col-span-6">
                            <img src="{{ $products[0] -> thumb }}" class="w-full rounded-36px" alt="">
                            <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $products[0]->name }}</p>
                            <div class="flex flex-row text-sm mt-3">
                                <p class="text-xanhLaDam text-base">{{ $products[0]->menu->name }}</p>
                                <p class="mx-2">•</p>
                                <p class="font-normal text-base">Hoàng Nhật Minh</p>
                                <p class="mx-2">•</p>
                                <p class="font-normal opacity-50 text-base">{{ $products[0]->created_at}}</p>
                            </div>
                            <p class="font-normal opacity-50 text-base">{{ $products[0]->description }}</p>
                        </a>
                        <a href="/{{ $products[1]->slug }}"
                           class="h-full lg:col-span-4 sm:col-span-12 md:col-span-5 lg:row-span-2 md:block flex flex-col justify-center">
                            <img src="{{ $products[0] -> thumb }}" class="w-full rounded-36px" alt="">
                            <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $products[1]->name }}</p>
                            <div class="flex flex-row text-sm mt-3">
                                <p class="text-xanhLaDam text-base">{{ $products[1]->menu->name }}</p>
                                <p class="mx-2">•</p>
                                <p class="font-normal text-base">Hoàng Nhật Minh</p>
                                <p class="mx-2">•</p>
                                <p class="font-normal opacity-50 text-base">{{ $products[1]->created_at}}</p>
                            </div>
                            <p class="font-normal opacity-50 md:hidden text-base">{{ $products[1]->description}}</p>
                        </a>
                        <a href="/{{ $products[2]->slug}}"
                           class="h-full lg:col-span-4 sm:col-span-12 md:col-span-5 lg:row-span-2 md:block flex flex-col justify-center">
                            <img src="{{ $products[2] -> thumb }}" class="w-full rounded-36px">
                            <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $products[2]->name }}</p>
                            <div class="flex flex-row text-sm mt-3">
                                <p class="text-xanhLaDam text-base">{{ $products[2]->menu->name }}</p>
                                <p class="mx-2">•</p>
                                <p class="font-normal text-base">Hoàng Nhật Minh</p>
                                <p class="mx-2">•</p>
                                <p class="font-normal opacity-50 text-base">{{ $products[2]->created_at }}</p>
                            </div>
                            <p class="font-normal opacity-50 md:hidden text-base">{{ $products[2]->description }}</p>
                        </a>

                    </div>
                </div>
            </div>

            <div class="mt-8 flex flex-col">
                <div class="mb-6">
                    <p class="float-left">Video</p>
                    <p class="float-right">Xem tất cả</p>
                </div>
                <div class="md:h-96 grid grid-cols-6 grid-flow-col gap-4">
                    <div
                        class="h-full w-full sm:h-[186px] sm:w-full content__video relative from-black bg-gradient-to-t rounded-36px h-96 col-span-6 lg:col-span-4 text-white">
                        <img src="/template/images/blog/videoFake.png"
                             class="w-full h-full sm:h-[186px] absolute mix-blend-overlay"/>
                        <div class="absolute text-lg text-white bottom-5 left-5">
                            <p class="font-semibold text-lg tracking-spaceChu">Đi cạnh cao tốc pháp vân ...</p>
                            <div class="flex flex-row items-center">
                                <p class="font-normal text-xs tracking-spaceChu">
                                    5000 lượt xem
                                </p>
                                <p class="mx-2">•</p>
                                <p class="opacity-50 font-normal text-xs tracking-spaceChu">
                                    18/08/2022
                                </p>
                            </div>
                        </div>
                    </div>

                    <div
                        class="lg:block hidden col-span-2 listVideo w-full lg:h-full md:h-[41%] overflow-auto touch-auto">
                        <div class="md:row-span-1 col-span-2">
                            <img class="w-full rounded-2xl" src="/template/images/blog/videoFake2.png" alt="">
                            <p class="mt-3 font-semibold text-sm tracking-spaceChu">Đi cạnh cao tốc pháp vân...</p>
                            <div class="flex flex-row items-center">
                                <p class="font-normal text-xs">5000 lượt xem</p>
                                <p class="mx-2">•</p>
                                <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                            </div>
                        </div>
                        <div class="mt-3 md:row-span-1 col-span-2">
                            <img class="w-full rounded-2xl" src="/template/images/blog/videoFake3.png" alt="">
                            <p class="mt-3 font-semibold text-sm tracking-spaceChu">Đi cạnh cao tốc pháp vân...</p>
                            <div class="flex flex-row items-center">
                                <p class="font-normal text-xs">5000 lượt xem</p>
                                <p class="mx-2">•</p>
                                <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                            </div>
                        </div>
                        <div class="mt-3 md:row-span-1 col-span-2">
                            <img class="w-full rounded-2xl" src="/template/images/blog/videoFake3.png" alt="">
                            <p class="mt-3 font-semibold text-sm tracking-spaceChu">Đi cạnh cao tốc pháp vân...</p>
                            <div class="flex flex-row items-center">
                                <p class="font-normal text-xs">5000 lượt xem</p>
                                <p class="mx-2">•</p>
                                <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                            </div>
                        </div>
                        <div class="mt-3 md:row-span-1 col-span-2">
                            <img class="w-full rounded-2xl" src="/template/images/blog/videoFake3.png" alt="">
                            <p class="mt-3 font-semibold text-sm tracking-spaceChu">Đi cạnh cao tốc pháp vân...</p>
                            <div class="flex flex-row items-center">
                                <p class="font-normal text-xs">5000 lượt xem</p>
                                <p class="mx-2">•</p>
                                <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                            </div>
                        </div>
                    </div>


                </div>
                <!-- List Video Mobile -->
                <div class="h-full mt-9 flex lg:hidden md:w-[700px] overflow-x-scroll touch-auto">
                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake2.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>
                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake2.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>
                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake2.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>
                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake2.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>
                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake2.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>
                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake2.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>
                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake3.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>
                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake3.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>
                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake3.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>

                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake3.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>

                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake3.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>

                    <div class="mr-6">
                        <img class="w-full rounded-2xl" src="/template/images/blog/videoFake3.png" alt="">
                        <p class="mt-3 font-semibold text-xs tracking-spaceChu w-56">Đi cạnh cao tốc pháp vân...</p>
                        <div class="flex flex-row items-center">
                            <p class="font-normal text-xs">5000 lượt xem</p>
                            <p class="mx-2">•</p>
                            <p class="opacity-50 font-normal text-xs">18/08/2022</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-9 flex flex-col justify-center">
                <p class="">Danh sách tin</p>

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
{{--                    {!! $products->appends(request()->all())->links() !!}--}}
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
