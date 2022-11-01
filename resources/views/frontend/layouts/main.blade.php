<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.includes.head')
</head>

<body>
<div class="md:w-10/12 w-11/12 mx-auto">
    <!-- Start Header -->
    @include('frontend.includes.header')
    <!-- End Header -->

    <!-- Start Slider -->
    @include('frontend.includes.slider')
    <!-- End Slider -->

    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">

            <!-- List Category -->
            @include('frontend.categories.list')

            <!-- List Category -->
            <div class="flex justify-center mt-12">
                <i class="fa-solid fa-square-rss text-xanhLaDam text-4xl mr-8"></i>
                <p class="text-4xl">Tin tức</p>
            </div>
            <div class="mt-8">
                <div class="flex justify-center items-center">
                    <div class="grid lg:grid-flow-col grid-flow-row grid-cols-10 gap-4 justify-items-center">
                        @if(isset($articles[0]))
                            <a href="{{ route('frontend.detail.index', $articles[0]->slug) }}"
                               class="row-span-4 col-span-12 lg:col-span-6">
                                <img src="{{ $articles[0] -> thumb }}" style="height: 800px;"
                                     class="w-full rounded-36px" alt="">
                                <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $articles[0]->title }}</p>
                                <div class="flex flex-row text-sm mt-3">
                                    <p class="text-xanhLaDam text-base">{{ $articles[0]->category->name }}</p>
                                    <p class="mx-2">•</p>
                                    <p class="font-normal text-base">{{ $articles[0]->author->name }}</p>
                                    <p class="mx-2">•</p>
                                    <p class="font-normal opacity-50 text-base">{{ $articles[0]->created_at}}</p>
                                </div>
                                <p class="font-normal opacity-50 text-base">{{ $articles[0]->description }}</p>
                            </a>
                        @endif
                        @if(isset($articles[1]))
                            <a href="{{ route('frontend.detail.index', $articles[1]->slug) }}"
                               class="h-full lg:col-span-4 sm:col-span-12 md:col-span-5 lg:row-span-2 md:block flex flex-col justify-center">
                                <img src="{{ $articles[1] -> thumb }}" style="height: 300px;"
                                     class="w-full rounded-36px"
                                     alt="">
                                <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $articles[1]->title }}</p>
                                <div class="flex flex-row text-sm mt-3">
                                    <p class="text-xanhLaDam text-base">{{ $articles[1]->category->name }}</p>
                                    <p class="mx-2">•</p>
                                    <p class="font-normal text-base">{{ $articles[1]->author->name }}</p>
                                    <p class="mx-2">•</p>
                                    <p class="font-normal opacity-50 text-base">{{ $articles[1]->created_at}}</p>
                                </div>
                                <p class="font-normal opacity-50 md:hidden text-base">{{ $articles[1]->description}}</p>
                            </a>
                        @endif
                        @if(isset($articles[0]))
                            <a href="{{ route('frontend.detail.index', $articles[2]->slug)}}"
                               class="h-full lg:col-span-4 sm:col-span-12 md:col-span-5 lg:row-span-2 md:block flex flex-col justify-center">
                                <img src="{{ $articles[2] -> thumb }}" style="height: 300px;"
                                     class="w-full rounded-36px">
                                <p class="mt-4 font-semibold text-lg tracking-spaceChu">{{ $articles[2]->title }}</p>
                                <div class="flex flex-row text-sm mt-3">
                                    <p class="text-xanhLaDam text-base">{{ $articles[2]->category->name }}</p>
                                    <p class="mx-2">•</p>
                                    <p class="font-normal text-base">{{ $articles[2]->author->name }}</p>
                                    <p class="mx-2">•</p>
                                    <p class="font-normal opacity-50 text-base">{{ $articles[2]->created_at }}</p>
                                </div>
                                <p class="font-normal opacity-50 md:hidden text-base">{{ $articles[2]->description }}</p>
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <!-- List video -->

            @include('frontend.includes.video')
            <!-- List video -->

            <!-- List articles -->
            @include('frontend.articles.list')
            <!-- List articles -->

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
