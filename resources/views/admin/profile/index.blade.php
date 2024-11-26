
@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/profile/profile.css')}}" />
@endsection


@section('content')
       <div style="background: white;">
           <div class="row">
               <div class="col-md-12 col-12" id="column_cover">
                   <div id="wrapAllCover">
                       <div id="cover">


                           @if($cover)
                               <img src="{{asset('profile/'.$cover->image)}}"  id="coverImage" alt="" style="top:-{{$cover->top_position}}px;">
                           @else
                               <img src="{{asset('profile/cover.jpg')}}" id="coverImage" style="top:-40px;" alt="">

                           @endif
                           <div class="position-absolute float-md-end bottom-0" style='display:none;z-index: 100' id="reposition_save_cancel">
                               <button class="btn-success btn btn-sm " id="saveNewPosition">Save Changes</button>
                               <button class="btn-danger btn btn-sm" id="cancel_reposition_button">Cancel</button>
                           </div>

                           <form action="{{route('profile.cover',[Auth()->user()->id])}}" method="POST" enctype="multipart/form-data" id="form2Id">
                               @csrf
                               <input type="file" name="cover" id="coverInput" style="display: none;">
                           </form>
                           <button id="coverButton">Change Cover Photo</button>
                           <ul class="cover2buttons" id="cover2buttons">
                               <li id="upload" class="btn  btn-sm btn-success">Upload</li> <br/>
                               <br/>
                               <li id="reposition" class="btn btn-primary btn-sm">Reposition</li>
                           </ul>
                       </div>
                       <div id="profile">
                           @if($profile)
                               <img src="{{asset('profile/'.$profile->image)}}" id="profileImage" alt="">
                           @else
                               <img src="{{asset('profile/profile.jpg')}}" id="profileImage" alt="">
                           @endif
                           <form action="{{route('profile.picture',[Auth()->user()->id])}}" method="POST" enctype="multipart/form-data" id="formId">
                               @csrf
                               <input type="file" name="profile" id="profileInput" style="display: none;">
                           </form>
                           <button id="profileButton"><i class="fas fa-camera"></i></button>
                       </div>
                   </div>
               </div>
           </div>
           <div class="row" id='overViewButton' >

           </div>
       </div>
       <div class="row" style="margin-top:50px;">
            <div class="col-md-6 col-12">
                <div class="row" id="seeAll_photos_block" style="margin-left:0;margin-bottom: 50px;background:white;padding: 11px 0px;height: 430px;overflow:hidden;">
        <div class="pb-3">
            <span>Photos</span>
            <span class="float-end text-primary text-decoration-none" id="seeAll">See All</span>
            <span class="float-end text-primary text-decoration-none"  id="closeAll" style="display:none;">Close</span>
        </div>
        @if($allData)
            @foreach($allData as $data)
                <div class="col-md-4 col-sm-4 col-4" style="padding:2px;height:135px;overflow:hidden;display:flex;justify-content: center;align-items: center;margin-bottom:3px;">
                    <img src="{{asset('profile/'.$data->image)}}"  style="width:99%;height:auto;margin-bottom: 2px;display:flex;gap:5px"   alt="">
                </div>
            @endforeach
        @endif
    </div>
            </div>
            <div class="col-md-6 col-12">
                <div id="wrapAllUploader" >
                    @if($allData)
                        @foreach($allData as $data)
                            <div class="row">
                                <div id="imageForProfile">
                                    <div id="wrapImageColumn">
                                        <div id="small_profile_images">
                                            <a href="#">
                                                @if($profile)
                                                    <img src="{{asset('profile/'.$profile->image)}}" alt="">
                                                @else
                                                    <img src="{{asset('profile/profile.jpg')}}" alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <div id="informationForNameAndDate">
                                            <a href="" class="text-decoration-none text-secondary">{{Auth()->user()->name}}</a>
                                            <br/>
                                            <a href="" class="text-decoration-none text-secondary ">{{$data->created_at}}</a>
                                        </div>
                                    </div>
                                    <img src="{{asset('profile/'.$data->image)}}"  style="width:100%;height:auto;"   alt="">
                                </div>
                            </div>

                        @endforeach
                    @endif

                </div>
            </div>
        </div>


@endsection
@section('js')
    <!--javascript work below the comment-->

    <script>
        document.querySelector('#profileButton').addEventListener('click',function(){
            document.getElementById('profileInput').click();
        });
        document.querySelector('#upload').addEventListener('click',function(){
            document.getElementById('coverInput').click();
        })
        $(document).ready(function(){
            $('#coverButton').click(function(){
                $('.cover2buttons').toggleClass('cover3buttons')
            });
        });
    </script>
    <script>
        $(document).ready(function(){
            $('#upBtn1').click(function(){
                $('#coverInput').click();
                $('.cover2buttons').removeClass('cover3buttons');
            })
        })

    </script>

    <script>
        // Function to get the current top value
        function getCurrentTopValue() {
            let topValue = $('#coverImage').css('top'); // e.g., '50px'
            return Math.abs(parseFloat(topValue)); // Convert to number and get absolute value
        }

        $(document).ready(function () {
            let dragging = false;
            let offsetY;
            const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent) || window.innerWidth <= 768;

            $('#reposition').click(function () {
                $('#reposition_save_cancel').css('display', 'block');
                alert('After clicking the reposition button, you have to press on this cover image to make changes');

                if (isMobile) {
                    $('#coverImage').on('touchstart', function (e) {
                        dragging = true;
                        offsetY = e.touches[0].clientY - $(this).offset().top;
                    });

                    $('#coverImage').on('touchmove', function (e) {
                        if (dragging) {
                            e.preventDefault(); // Prevent scrolling
                            $(this).css({
                                'top': (e.touches[0].clientY - offsetY) + 'px'
                            });
                        }
                    });

                    $('#coverImage').on('touchend', function () {
                        dragging = false;
                        let currentTop = getCurrentTopValue();
                    });
                } else {
                    $('#coverImage').on('mousedown', function (e) {
                        dragging = true;
                        offsetY = e.clientY - $(this).offset().top;
                    });

                    $(document).on('mousemove', function (e) {
                        if (dragging) {
                            $('#coverImage').css({
                                'top': (e.clientY - offsetY) + 'px'
                            });
                        }
                    });

                    $(document).on('mouseup', function () {
                        dragging = false;
                        let currentTop = getCurrentTopValue();
                    });
                }
            });
        });
    </script>

    <script>
        $('#cancel_reposition_button').click(function (){
            $('#reposition_save_cancel').css({
                'display':'none',
            });

        });

    </script>
    <script>
        $('#seeAll').click(function (){
            $(this).css({
                'display':'none',
            });
            $('#closeAll').css({
                'display':'block',
            });
            $('#seeAll_photos_block').css({
                'height':'auto',
            })
        });
        $('#closeAll').click(function (){
            $(this).css({
                'display':'none',
            });
            $('#seeAll').css({
                'display':'block',
            });
            $('#seeAll_photos_block').css({
                'height':'430px',
            })
        });
    </script>
    <script>
        // "formId" this id is appear to the form that you want to submit. You can change the name of ID
        $(document).on("change", "#formId", function (e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            const formData = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                success: function (info) {
                    console.log("Form successfully submitted");
                    // please add code here when form successfully summitted.
                    location.reload();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });

    </script>
    <script>
        $(document).on("change", "#form2Id", function (e) {
            e.preventDefault();
            var form = $(this);
            var url = form.attr('action');
            const formData = new FormData(form[0]);

            $.ajax({
                type: "POST",
                url: url,
                data: formData,
                success: function (info) {
                    console.log("Form successfully submitted");
                    // please add code here when form successfully summitted.
                    location.reload();
                },
                cache: false,
                contentType: false,
                processData: false
            });
        });
    </script>
    @if($cover)
        <script>
            $(document).ready(function (){
                var id = {{Auth()->user()->id}};
                var image_id = {{$cover->id}} ;
                var base_url = "{{url('/')}}";

                $('#saveNewPosition').click(function (){
                    let topValue = getCurrentTopValue();
                    $.ajax({
                        type:'GET',
                        url:base_url+'/admin/profile/cover-reposition/'+id+'/'+image_id+'/'+topValue,
                        success:function (){
                            location.reload();
                        },
                        error:function (){
                            alert('error');
                        }
                    })
                });


            });
        </script>
    @else
        <script>
            $(document).ready(function (){
                $('#saveNewPosition').click(function (){
                    alert('you have to upload cover photo for changing the position')
                    location.reload();
                });
            });
        </script>

    @endif
    <script>
        $(document).ready(function () {
            const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent) || window.innerWidth <= 768;

            if (isMobile) {
                console.log("This is a smartphone or tablet.");
                // Code for smartphones or tablets
            } else {
                console.log("This is a PC.");
                // Code for PCs
            }
        });
    </script>
@endsection
