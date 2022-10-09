<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
</head>

<body>
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v15.0" nonce="cM0jYM5X"></script>
<div class="md:w-10/12 w-11/12 mx-auto">
    <!-- Start Header -->
    @include('frontend.includes.header')
    <!-- End Header -->

    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">
            <div class="mt-11 flex justify-between">
                <a href="{{ route('frontend.main.index') }}" class="flex flex-row arrow-back">
                    <i class="py-1.5 fa-solid fa-less-than"></i>
                    <p class="ml-6 py-1.5 arrow-back__text">Quay lại</p>
                </a>
                <div class="flex flex-row ">
                    <p class="hidden md:block py-1.5 text-sm font-normal opacity-70">Chuyên mục</p>
                    <div class="bg-xanhLaDam ml-4 rounded-36px text-white py-1.5 px-9">{{ $article->category->name}}</div>
                </div>
            </div>
            <div class="mt-16">
                <p class="text-3xl font-bold tight1">{{ $article->title }}</p>
            </div>
            <div class="mt-3 md:flex justify-between">
                <div class="flex flex-row">
                    <p class="text-xanhLaDam font-semibold text-base text-[14px] tracking-spaceChu">{{ $article->category->name}}</p>
                    <p class="mx-2">•</p>
                    <p class="font-normal text-base text-[14px] tracking-spaceChu">{{ $article->author->name }}</p>
                    <p class="mx-2">•</p>
                    <p class="font-normal opacity-50 text-base text-[14px] tracking-spaceChu">{{ $article->created_at }}</p>
                </div>
                <div class="columns-3 md:mt-0 mt-3">
                    <div class="text-white rounded-36px flex items-center justify-center py-1.5 px-6 border-2 border-gray-300" style="background-color: #ccc;">
                        <i class="fa-solid fa-envelope"></i>
                        <p class="ml-2 hidden lg:block font-normal text-base text-sm">Gửi mail</p>
                    </div>

                    <div class="btn fb-share-button rounded-36px flex items-center justify-center py-1.5 px-6 border-2 border-primary bg-primary" data-href="{{ route('frontend.detail.index', $article->slug) }}" data-layout="button" data-size="large">
                        <i class="fa-brands fa-facebook"></i>
                        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">
                           <p class="bg-none ml-2 hidden lg:block font-normal text-base text-sm ">Chia sẻ</p>
                        </a>
                    </div>

                    <div class="rounded-36px flex items-center justify-center py-1.5 px-6 border-2 border-black bg-white">
                        <i class="fa-solid fa-heart-circle-check"></i>
                        <p class="ml-2 hidden lg:block font-normal text-base text-sm">Lưu</p>
                    </div>
                </div>
            </div>

            <div class="mt-9 d-flex justify-content-center">
                <img src="{{ $article->thumb }}" class="rounded-36px" style="height: 600px;" alt="">
            </div>
            <div class="mt-9">
                <p class="font-normal text-base opacity-70">{!! $article->content !!}</p>
            </div>
            <div class="mt-9 w-full">
                <div class="grid grid-cols-3 gap-4">
                    <div class="md:col-span-2 col-span-3">
                        <img src="{{ $article->thumb }}" class="md:h-full sm:w-full" alt="">
                    </div>
                    <div class="md:col-span-1 sm:col-span-3 flex md:flex-col ">
                        <img src="{{ $article-> thumb}}" class="md:h-1/2 md:mb-3 sm:w-1/2 sm:mr-3 rounded-36px" alt="">
                        <img src="{{ $article-> thumb}}" class="md:h-1/2 sm:w-1/2 rounded-36px" alt="">
                    </div>
                </div>
            </div>
            <div class="mt-9">
                <p class="font-semibold text-2xl">{{ $article->description }}</p>
                <p class="mt-4 font-normal text-base opacity-70 tracking-[0.005em]">
                    {!! $article->content !!}
                </p>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 1: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 2: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 3: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 4: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
                <div class="mt-3"><p class="float-left mr-3">• Tiêu chí 5: </p><p class="flex flex-wrap font-normal text-base opacity-70 ml-3 tracking-[0.005em]"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Blandit molestie etiam nunc egestas</p></div>
            </div>
            <div class="mt-9 flex flex-row">
                <a href="{{ route('frontend.main.listbytag', $article->tags[0]->slug) }}" class="rounded-36px px-9 py-1.5 w-36 flex justify-center items-center" style="background-color: #E6E6E6;">{{ $article->tags[0]->name }}</a>
            </div>
            <div class="mt-9 flex flex-row justify-between">
                <div class="flex">
                    <p class="py-1.5 mr-4 font-semibold text-sm">Tin cùng chuyên mục</p>
                    <p class=" text-sm bg-xanhLaDam text-white rounded-36px px-6 py-1.5 flex justify-center items-center">{{ $article->category->name}}</p>
                </div>
                <i class="py-1.5 fa-solid fa-greater-than hidden sm:block"></i>
                <a href="{{ route('frontend.category.index', $article->category->slug) }}" class="sm:hidden text-sm font-normal text-mauChu">Xem tất cả</a>
            </div>
            <div class="mt-9 flex flex-col justify-center">

                @foreach($articles as $article1)
                    <a href="{{ route('frontend.detail.index', $article1->slug)}}" class="flex flex-row sm:flex-col my-8">
                        <div class="w-full mr-6 d-flex justify-center">
                            <img class="" style="height: 300px;" src="{{ $article1->thumb }}" alt="">
                        </div>
                        <div class="flex flex-col w-full">
                            <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $article1->name }}</p>
                            <div class="flex flex-row text-xs tracking-spaceChu">
                                <p class="text-xanhLaDam mr-2 text-base">{{ $article1->category->name }} •</p>
                                <p class="font-normal mr-2 text-base">Hoàng Minh •</p>
                                <p class="font-normal opacity-50 text-base">{{ $article1->created_at }}</p>
                            </div>
                            <p class="font-normal opacity-50 text-base">{{ $article1->description }}</p>
                        </div>
                    </a>
                @endforeach

                {{--                <div class="mt-9 flex justify-between">--}}
                {{--                    <p class="font-normal">Tin thịnh hành</p>--}}
                {{--                    <i class="fa-solid fa-greater-than hidden sm:block"></i>--}}
                {{--                    <a href="/category/{{$article->category->id}}" class="sm:hidden opacity-70 font-normal">Xem tất cả</a>--}}
                {{--                </div>--}}

                {{--                        @foreach($articles as $article1)--}}
                {{--                            <div class="flex flex-row sm:flex-col my-8">--}}
                {{--                                <div class="w-full mr-6">--}}
                {{--                                    <img class="w-full" src="{{ $article1->thumb }}" alt="">--}}
                {{--                                </div>--}}
                {{--                                <div class="flex flex-col w-full">--}}
                {{--                                    <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $article1->name }}</p>--}}
                {{--                                    <div class="flex flex-row text-xs tracking-spaceChu">--}}
                {{--                                        <p class="text-xanhLaDam mr-2 text-base">{{ $article1->category->name }} •</p>--}}
                {{--                                        <p class="font-normal mr-2 text-base">Hoàng Minh •</p>--}}
                {{--                                        <p class="font-normal opacity-50 text-base">{{ $article1->created_at }}</p>--}}
                {{--                                    </div>--}}
                {{--                                    <p class="font-normal opacity-50 text-base">{{ $article1->description }}</p>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        @endforeach--}}

            </div>
        </div>
    </div>

    <!-- End Content -->

    <!-- Start Footer -->
    <div id="footer"></div>
    <!--End Footer  -->
</div>
@include('frontend.includes.footer')
</body>

</html>
