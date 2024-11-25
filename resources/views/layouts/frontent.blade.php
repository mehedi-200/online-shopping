<!DOCTYPE html>
<html lang="en">
<head>
    <title> @if(isset($page_title)) {{$page_title}} @else Smart Shop @endif </title>
    <meta name="description" content="@if(isset($page_title)) {{$page_title}} @else Smart Shop @endif">
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/icon/font-awesome/css/font-awesome.min.css')}}">
    <script src="https://kit.fontawesome.com/215d46e8f2.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/eco-main.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/product.css')}}">
    @yield('css')
</head>
<body>
@include('common/header')

@yield('content')

@include('common/footer')



<input type="hidden" id="base_url" value="{{url('/')}}">


<script src="{{asset('frontend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('frontend/js/popper.js')}}"></script>
<script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
@yield('js')

<script src='{{asset('frontend/js/owl.carousel.js')}}'></script>
<script src='{{asset('frontend/js/select2.js')}}'></script>
<script src='{{asset('frontend/js/wow.js')}}'></script>
<script src="{{asset('frontend/js/eco-main.js')}}"></script>
<script src="{{asset('frontend/js/common.js')}}"></script>

</body>
</html>
