{{--@extends('layouts.admin')--}}
{{--@section('css')--}}
{{--    <link rel="stylesheet" href="{{asset('admin/setting/frontColorChange.css')}}"/>--}}
{{--@endsection--}}
{{--@section('content')--}}

{{--    <h2 class="text-secondary">Background Colour Change</h2>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <label for="color name" class="col-md-3 col-sm-4 col-5 text-danger fs-3 mt-3 ">Red Color</label>--}}
{{--            <div class="col-md-8 mt-3 col-sm-8 col-7 ">--}}
{{--                <div class="class colour1" id="class1">--}}
{{--                    <div class="red2 @if(mehedi()=='a81414') colorActive @endif"></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <label for="color name" class="col-md-3 col-sm-4 col-5  text-warning fs-3 mt-3">Yellow Color</label>--}}
{{--            <div class="col-md-8 mt-3 col-sm-8 col-7">--}}
{{--                <div class=" class colour6" id="class2">--}}
{{--                    <div class="yellow2 @if(mehedi()=='d9c300') colorActive @endif "></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <label for="color name" class="col-md-3 col-sm-4 col-5   text-primary fs-3 mt-3">blue Color</label>--}}

{{--            <div class="col-md-8 mt-3 col-sm-8 col-7">--}}
{{--                <div class=" class colour5" id="class3">--}}
{{--                    <div class="blue2 @if(mehedi()=='060988') colorActive @endif "></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <label for="color name" class="col-md-3  col-sm-4 col-5     text-success fs-3 mt-3">green Color</label>--}}

{{--            <div class="col-md-8 mt-3 col-sm-8 col-7">--}}
{{--                <div class=" class colour4" id="class4">--}}
{{--                    <div class="green2 @if(mehedi()=='037b03') colorActive @endif "></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <label for="color name" style="color:#ff5900" class="col-md-3  col-sm-4 col-5    fs-3 mt-3">Orange Color</label>--}}

{{--            <div class="col-md-8 mt-3 col-sm-8 col-7">--}}
{{--                <div class=" class colour3" id="class5">--}}
{{--                    <div class="orange2 @if(mehedi()=='fd4c0a') colorActive @endif "></div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--            <label for="color name" class="col-md-3 col-sm-4 col-5    text-dark fs-3 mt-3">Black Color</label>--}}

{{--            <div class="col-md-8 mt-3 col-sm-8 col-7">--}}
{{--                <div class=" class colour2" id="class6">--}}
{{--                    <div class="black2 @if(mehedi()=='322f2f') colorActive @endif"></div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}




{{--@endsection--}}


{{--@section('js')--}}
{{--    <script>--}}


{{--        $('#class1').click(function (){--}}
{{--            $('.red2').addClass('colorActive');--}}
{{--            $('.blue2').removeClass('colorActive');--}}
{{--            $('.yellow2').removeClass('colorActive');--}}
{{--            $('.green2').removeClass('colorActive')--}}
{{--            $('.orange2').removeClass('colorActive');--}}
{{--            $('.black2').removeClass('colorActive');--}}
{{--        })--}}
{{--        $('#class2').click(function (){--}}
{{--            $('.yellow2').addClass('colorActive');--}}
{{--            $('.blue2').removeClass('colorActive');--}}
{{--            $('.red2').removeClass('colorActive');--}}
{{--            $('.green2').removeClass('colorActive');--}}
{{--            $('.orange2').removeClass('colorActive');--}}
{{--            $('.black2').removeClass('colorActive');--}}
{{--        })--}}
{{--        $('#class3').click(function (){--}}
{{--            $('.blue2').addClass('colorActive');--}}
{{--            $('.red2').removeClass('colorActive');--}}
{{--            $('.yellow2').removeClass('colorActive');--}}
{{--            $('.green2').removeClass('colorActive');--}}
{{--            $('.orange2').removeClass('colorActive');--}}
{{--            $('.black2').removeClass('colorActive');--}}
{{--        })--}}
{{--        $('#class4').click(function (){--}}
{{--            $('.green2').addClass('colorActive');--}}
{{--            $('.red2').removeClass('colorActive');--}}
{{--            $('.yellow2').removeClass('colorActive');--}}
{{--            $('.blue2').removeClass('colorActive');--}}
{{--            $('.orange2').removeClass('colorActive');--}}
{{--            $('.black2').removeClass('colorActive');--}}
{{--        })--}}
{{--        $('#class5').click(function (){--}}
{{--            $('.green2').removeClass('colorActive');--}}
{{--            $('.red2').removeClass('colorActive');--}}
{{--            $('.yellow2').removeClass('colorActive');--}}
{{--            $('.blue2').removeClass('colorActive');--}}
{{--            $('.orange2').addClass('colorActive');--}}
{{--            $('.black2').removeClass('colorActive');--}}
{{--        })--}}
{{--        $('#class6').click(function (){--}}
{{--            $('.green2').removeClass('colorActive');--}}
{{--            $('.red2').removeClass('colorActive');--}}
{{--            $('.yellow2').removeClass('colorActive');--}}
{{--            $('.blue2').removeClass('colorActive');--}}
{{--            $('.orange2').removeClass('colorActive');--}}
{{--            $('.black2').addClass('colorActive');--}}
{{--        })--}}




{{--    </script>--}}
{{--    <script>--}}

{{--       $(document).ready(function(){--}}
{{--          var url = '{{url("/")}}';--}}
{{--          var red = "a81414";--}}
{{--          var black = '322f2f';--}}
{{--          var orange = "fd4c0a";--}}
{{--          var green = "037b03";--}}
{{--          var blue = "060988";--}}
{{--          var yellow = "d9c300";--}}
{{--          if(!$('.red2').hasClass('colorActive')){--}}
{{--              $('.colour1').click(function (){--}}
{{--                  $.ajax({--}}
{{--                      type:'GET',--}}
{{--                      url:url+"/admin/setting/front-color-change/"+red,--}}
{{--                      success:function (){--}}
{{--                          alert("Front colour has been successfully changed")--}}
{{--                      }--}}

{{--                  });--}}
{{--              });--}}
{{--          }--}}

{{--          if(!$('.black2').hasClass('colorActive')){--}}
{{--              $('.colour2').click(function (){--}}
{{--                  $.ajax({--}}
{{--                      type:'GET',--}}
{{--                      url:url+"/admin/setting/front-color-change/"+ black,--}}
{{--                      success:function (){--}}
{{--                          alert("Front colour has been successfully changed")--}}
{{--                      }--}}
{{--                  });--}}
{{--              });--}}
{{--          }--}}
{{--          if(!$('.orange2').hasClass('colorActive')){--}}
{{--              $('.colour3').click(function (){--}}
{{--                  $.ajax({--}}
{{--                      type:'GET',--}}
{{--                      url:url+"/admin/setting/front-color-change/"+ orange,--}}
{{--                      success:function (){--}}
{{--                          alert("Front colour has been successfully changed")--}}
{{--                      }--}}
{{--                  });--}}
{{--              });--}}
{{--          }--}}
{{--          if(!$('.green2').hasClass('colorActive')){--}}
{{--              $('.colour4').click(function (){--}}
{{--                  $.ajax({--}}
{{--                      type:'GET',--}}
{{--                      url:url+"/admin/setting/front-color-change/"+ green,--}}
{{--                      success:function (){--}}
{{--                          alert("Front colour has been successfully changed")--}}
{{--                      }--}}
{{--                  });--}}
{{--              });--}}
{{--              }--}}
{{--           if(!$('.blue2').hasClass('colorActive')){--}}
{{--               $('.colour5').click(function (){--}}
{{--                   $.ajax({--}}
{{--                       type:'GET',--}}
{{--                       url:url+"/admin/setting/front-color-change/"+ blue,--}}
{{--                       success:function (){--}}
{{--                           alert("Front colour has been successfully changed")--}}
{{--                       }--}}
{{--                   });--}}
{{--               });--}}
{{--           }--}}
{{--           if(!$('.yellow2').hasClass('colorActive')){--}}
{{--               $('.colour6').click(function (){--}}
{{--                   $.ajax({--}}
{{--                       type:'GET',--}}
{{--                       url:url+"/admin/setting/front-color-change/"+ yellow,--}}
{{--                       success:function (){--}}
{{--                           alert("Front colour has been successfully changed")--}}
{{--                       }--}}
{{--                   });--}}
{{--               });--}}
{{--           };--}}

{{--       });--}}
{{--    </script>--}}
{{--@endsection--}}
