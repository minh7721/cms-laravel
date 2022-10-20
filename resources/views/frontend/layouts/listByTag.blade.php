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
            <!-- List tag -->
{{--            @include('frontend.tags.list')--}}
            <!-- List tag -->

            <!-- List articles -->
            <div class="articles-list">
                @include('frontend.articles.list')
            </div>
            <!-- List articles -->
        </div>
    </div>
    <!-- End Content -->

    <!-- Start Footer -->
    <div id="footer"></div>
    <!--End Footer  -->
</div>
@include('frontend.includes.footer')

@yield('scripts')
</body>

</html>
