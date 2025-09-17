<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Home</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/icon/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/icon/icofont/icofont.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/icon/simpleline/css/simple-line-icons.css')}}">
{{--    <link rel="stylesheet" type="text/css" href="{{asset('admin/icon/icon-pe7/css/pe-icon-7-stroke.css')}}">--}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Kanit:wght@300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800&display=swap">
    <!-- Toastr CSS CDN -->
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <!-- Font Awesome CDN -->
    <script src="https://kit.fontawesome.com/215d46e8f2.js" crossorigin="anonymous"></script>

    <!--============== Extra Plugin =================-->

    <!--============== End Extra Plugin =================-->

    @yield('css')

    <!--======== Custom =============-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/custom-helper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin/css/main.css')}}">
</head>
<body>
<!--========== Navbar ==========-->
@include('admin/common/header')

<div class="panel-wrapper">

    <!--======= Aside =========-->
    @include('admin/common/aside')

    <div class="wrapping-content" id="wrappingBody">
        @yield('content')
        @include('admin/common/footer')

    </div>
</div>
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p id="message"></p>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-danger" id="delete"> <i class="fa fa-recycle"></i>
                    Delete </a>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="base_url" value="{{url('/')}}">





<script type="text/javascript" src="{{asset('admin/js/jquery-3.6.0.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/popper.min.js')}}"></script>
<script type="text/javascript" src="{{asset('admin/js/bootstrap.min.js')}}"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<!--============== Extra Plugin ===================-->
{!! Toastr::message() !!}

<!--==== Chart Js ========-->
<script type="text/javascript" src="{{asset('admin/plugin/appexchart/dist/apexcharts.js')}}"></script>

@yield('js')
<!--============== End Plugin ===================-->
<script>
    function deleteItem(link, item) {
        $("#deleteModal #message").html("Are you sure you want to delete this " + item + "?");
        $("#deleteModal #delete").attr('href', link);
        $("#deleteModal").modal("show");
    }
</script>
<!--============ Custom Main ================-->
<script type="text/javascript" src="{{asset('admin/js/main.js')}}"></script>
@include('common.activeOrInactiveAsset')
</body>
</html>
