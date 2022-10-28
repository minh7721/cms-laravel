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

    <!-- Start Content -->
    <div id="content" class="mt-9 flex justify-center">
        <div class="lg:w-9/12 sm:w-full">
            <!-- List Category -->
{{--            @include('frontend.categories.list')--}}
            <!-- List Category -->
            <form class="form-inline mb-3" action="{{ route('frontend.search.index') }}" method="GET">
                <input class="form-control mr-sm-2 valueSearch" name="search" value="{{ $search ?? '' }}" type="search" placeholder="Search" aria-label="Search">
                <button class="btn my-2 my-sm-0 bg-xanhLaDam text-white btnSearch" type="submit" value="{{ $search ?? '' }}">Search</button>
            </form>
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
