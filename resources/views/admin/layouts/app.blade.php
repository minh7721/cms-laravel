<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">

<head>
    @include('admin.includes.head')
</head>

<body class="sidebar-mini layout-fixed" style="height: auto;">
<div class="wrapper">
    @include('admin.includes.main_header')
    @include('admin.includes.sidebar')

    <div class="content-wrapper">

{{--        @yield('before_breadcrumbs_widgets')--}}

{{--        @includeWhen(isset($breadcrumbs), 'admin.includes.breadcrumbs')--}}

{{--        @yield('after_breadcrumbs_widgets')--}}

        <section class="content-header">
            @yield('header')
        </section>

        <section class="content">
            <div class="container-fluid">

                @yield('before_content_widgets')

                @yield('content')

                @yield('after_content_widgets')

            </div>
        </section>
    </div>
</div>

@include('admin.includes.footer')

@include('admin.includes.scripts')
</body>
</html>