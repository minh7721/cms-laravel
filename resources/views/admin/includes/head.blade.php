<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ $title ?? config('app.name', 'Laravel') }}</title>

@yield('before_styles')
@stack('before_styles')


<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css"/>

<link rel="stylesheet" href="{{asset('assets_admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">

<link rel="stylesheet" href="{{asset('assets_admin/css/adminlte.min.css?v=3.2.0')}}">
<link rel="stylesheet" href="{{asset('assets_admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css')}}">
<link rel="stylesheet" href="{{asset('Toast/build/toastr.css')}}"/>
@yield('after_styles')
@stack('after_styles')
