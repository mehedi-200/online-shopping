
@extends('layouts.admin')

@section('css')
    <link rel="stylesheet" href="{{asset('admin/profile/profile.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Add Cropper.js CSS and JS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />

@endsection


@section('content')
       <div style="background: white;">
           <div class="row">
               <div class="col-md-12 col-12" id="column_cover">
                   <div id="wrapAllCover">
                       <div id="cover">


                           @if($cover)
                               <img src="{{asset('profile/'.$cover->image)}}" data-coverid="{{$cover->id}}"  id="coverImage" alt="" style="top:-{{$cover->top_position}}px;">
                           @else
                               <img src="{{asset('profile/cover.jpg')}}" data-coverid="{{$cover ? $cover->id:''}}" id="coverImage" style="top:-40px;" alt="">

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
                               <input type="file" name="profile" id="keep_profile_value"  style="display: none;">

                           </form>
                               <button id="profileButton"><i class="fas fa-camera"></i></button>
                               <input type="file" id="profileInput" name="profile_lost" style="display: none;">

                       </div>
                       <div class="w-50 position-absolute center text-success fs-3"  id="resize_profile_image" style=";display:none;z-index:2;">
                           <img  id="profile_image_preview" width="100%" alt="">
                           <button class="btn btn-sm btn-success  position-absolute bottom-0 w-50 left" id="submit_resize_profile_image">Submit</button>
                           <button class="btn btn-sm btn-danger  position-absolute bottom-0  w-50 right" id="resize_profile_image_d_none_btn">cancel</button>
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
       <input type="hidden" value="{{Auth()->user()->id}}" id="authUserIdForCoverImage">


@endsection
@section('js')
    <!--javascript work below for this page-->
    <script src="{{asset('admin/js/common.js')}}"></script>
    <!--javascript work below for this page-->


    <!-- jQuery -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap CSS -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Cropper.js -->
    <!-- jQuery -->    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>



    <script>
        $(document).ready(function () {
            let cropper;

            // When the user selects a file
            $(document).on("change", "#profileInput", function (e) {
                let files = e.target.files[0];
                if (files) {
                    const reader = new FileReader();
                    reader.onload = function (a) {
                        // Show the image preview
                        $('#profile_image_preview').attr('src', a.target.result);
                        $('#resize_profile_image').css({
                            'display':'block',
                        });
                        // Destroy any previous cropper instance
                        if (cropper) cropper.destroy();
                        {
                            cropper = new Cropper($('#profile_image_preview')[0], {
                                aspectRatio: 1, // Square cropping
                                viewMode: 1,    // Restrict crop box to within the image


                        });
                        }

                    };
                    reader.readAsDataURL(files);
                }
            });
            $('#submit_resize_profile_image').click(function () {
                if (cropper) {
                    // ক্রপ করা ইমেজের ডেটা তৈরি
                    const croppedCanvas = cropper.getCroppedCanvas();
                    const croppedImageData = croppedCanvas.toDataURL('image/png'); // Base64 format

                    // AJAX অনুরোধ ব্যবহার করে POST মেথডে ডেটা পাঠানো
                    let base_url = '{{url("/")}}';
                    let id = "{{Auth()->user()->id}}";

                    $.ajax({
                        type: 'POST', // POST মেথড ব্যবহার করা হচ্ছে
                        url: base_url + '/admin/profile/index/check-data-ajax',
                        data: {
                            id: id, // ইউজার আইডি পাঠানো হচ্ছে
                            image: croppedImageData // ইমেজের ডেটা পাঠানো হচ্ছে
                        },
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}' // CSRF টোকেন সিকিউরিটির জন্য
                        },
                        success: function (response) {
                            console.log("Image successfully uploaded");
                            location.reload();
                            alert('ইমেজ সফলভাবে আপলোড হয়েছে');
                        },
                        error: function () {
                            alert('ইমেজ আপলোড ব্যর্থ হয়েছে');
                        }
                    });
                }
            });

        });
    </script>

                // "formId" this id is appear to the form that you want to submit. You can change the name of ID

{{--    <script>--}}
{{--        $(document).on("change", "#formId", function (e) {--}}

{{--            e.preventDefault();--}}
{{--            var form = $(this);--}}
{{--            var url = form.attr('action');--}}
{{--            const formData = new FormData(form[0]);--}}

{{--            $.ajax({--}}
{{--                type: "POST",--}}
{{--                url: url,--}}
{{--                data: formData,--}}
{{--                success: function (info) {--}}
{{--                    console.log("Form successfully submitted");--}}
{{--                    // please add code here when form successfully summitted.--}}
{{--                    location.reload();--}}
{{--                },--}}
{{--                cache: false,--}}
{{--                contentType: false,--}}
{{--                processData: false--}}
{{--            });--}}
{{--        });--}}
{{--    </script>--}}

{{--    </script>--}}
    <script>

    </script>

{{--    <script>--}}
{{--        $(document).ready(function () {--}}
{{--            const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent) || window.innerWidth <= 768;--}}

{{--            if (isMobile) {--}}
{{--                console.log("This is a smartphone or tablet.");--}}
{{--                // Code for smartphones or tablets--}}
{{--            } else {--}}
{{--                console.log("This is a PC.");--}}
{{--                // Code for PCs--}}
{{--            }--}}
{{--        });--}}
{{--    </script>--}}

    <script>

    </script>


@endsection
