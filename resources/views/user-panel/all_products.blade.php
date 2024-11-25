@extends('layouts.frontent')
@section('css')
    <link rel="stylesheet" href="{{asset('frontend/css/price-range-slider.css')}}">

@endsection
@section('content')
    <!-- ================== Direction ================= -->
    <div class="container">
        <div class="direction py-3">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{url('/')}}" class="text-radical-red">{{__('app.home')}} <i class="fa fa-angle-right pl-1"></i></a>
                </li>
                <li class="list-inline-item">
                    <span>{{__('app.products')}}</span>
                </li>
            </ul>
        </div>
    </div>

    <!-- ================== Direction ================= -->
    <!-- ==================== Start Block ============== -->
    <div class="pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">

                    <!-- ================ Start Body list grid ================= -->
                    <div class="pb-3">
                        <div class="d-flex flex-wrap border-bottom mb-4">
                            <div class="heading-title">
                                {{__('app.all').' '.__('app.product')}} <span class="text-muted text-12 px-1">(  {{$products->count()}}   {{__('app.items')}})</span>
                            </div>
                            <div class="mb-2  ml-auto">
                                <ul class="nav nav-tabs grid-list-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#gridView"><i class="icon-grid"></i></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#listView"><i class="icon-list"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>


                        <div class="tab-content">

                            <div class="tab-pane fade show active" id="gridView">

                                <div class="row">


                                @foreach($products as $product)
                                                <div class="col-sm-6 col-lg-3 mb-4">
                                                    <div class="product-item border">
                                                        <div class="product-img bg-white">
                                                            <img src="{{asset('product/'.$product->image)}}" data-id="{{$product->id}}" class="img-fluid mx-auto d-block click-product-like-unlike">
                                                            <a href="javascript:void(0)" data-id="{{$product->id}}" class="btn wishlist-btn product-like-unlike product-{{$product->id}}  {{checkLike($product->id) === 'yes' ? 'active' : ''}}" ><i class="fa fa-heart-o" ></i></a>
                                                            <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                            <a href="{{route('productDetails',[$product->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                            <a href="javascript:void(0)" data-slug="{{$product->slug}}" data-qty="1"  style="{{add_to_card_product($product->id) === 'yes' ? 'background:#19a719':''}}" class="overlay-add-cart add-to-card card-product{{$product->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($product->id) === 'yes' ? __('app.exists_product') : __('app.add').' '.__('app.to').' '.__('app.card')}}</a>
                                                        </div>
                                                        <div class="p-3">
                                                            <div id="product_title">
                                                                <a href="{{route('productDetails',[$product->slug])}}" id="title_box" class="d-block product-title text-muted">{{$product->title}}</a>

                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <span class="text-bold text-20 text-radical-red" id="product_price_value">${{$product->price}}</span>
                                                                <div class="d-flex text-13 text-light-orange mt-2">
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star"></i>
                                                                    <i class="fa fa-star-o"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                </div>

                            </div>
                            <div class="tab-pane fade " id="listView">
                                @foreach($products as $product)
                                <div class="product-item mb-4 border" >
                                    <div class="row" id="product-{{$product->slug}}">
                                        <div class="col-lg-4" >
                                            <div class="product-img">
                                                <img src="{{asset('product/'.$product->image)}}" data-id="{{$product->id}}" class="img-fluid mx-auto d-block click-product-like-unlike">
                                                    <a href="javascript:void(0);" data-id="{{$product->id}}" class="btn wishlist-btn product-like-unlike product-{{$product->id}} {{checkLike($product->id) === 'yes' ? 'active' : ''}}"><i class="fa fa-heart-o"></i></a>
                                                <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                <a href="{{route('productDetails',[$product->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0)" data-slug="{{$product->slug}}" data-qty="1"  style="{{add_to_card_product($product->id) === 'yes' ? 'background:#19a719':''}}" class="overlay-add-cart add-to-card card-product{{$product->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($product->id) === 'yes' ? __('app.exists_product') : __('app.add').' '.__('app.to').' '.__('app.card')}}</a>
                                            </div>
                                        </div>
                                        <div class="col-lg-8" >
                                            <div class="p-3">
                                                <a href="{{route('productDetails',[$product->slug])}}" class="d-block product-title text-bold">{{$product->title}}</a>
                                                <div class="d-flex justify-content-between">
                                                    <span class="text-bold text-20 text-radical-red">${{$product->price}}</span>
                                                    <div class="d-flex text-13 text-light-orange mt-2">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                </div>
                                                <p class="text-muted">{{__('app.product').' '.__('app.id')}}: {{$product->id}}</p>
                                                <p class="text-muted">{{$product->details}}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>

                        </div>


                    </div>
                    <div class="py-5">
                        <div class="d-flex flex-wrap justify-content-end">
                            <div class=" mr-3 mb-3">
                                <div class="d-flex">
                                    <div class="m-0">
                                        <select class="form-control form-control-sm rounded-0 pr-5">
                                            <option>{{__('app.product').' '.__('app.name')}}</option>
                                            <option>{{__('app.product').' '.__('app.price')}}</option>
                                        </select>
                                    </div>
                                    <div class="border px-2 pt-1 text-13 text-muted">
                                        <i class="fa fa-sort-amount-desc"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="radical-pagination mr-3 mb-3">
                                <ul class="pagination pagination-sm">
                                    <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-left"></i></a></li>
                                    <li class="page-item"><a class="page-link active" href="#">1</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
    <!-- ==================== End Block ============== -->

@endsection
@section('js')
    <script>
      function total_price (){
          let price = parseInt($('#product_price_value').val());

          return price.reduce((previousVal,currentVal)=>previousVal+currentVal);

      }
    </script>





    <script src=''>

    </script>
    <script src=''></script>

    <script src="js/eco-main.js"></script>
    <script src="{{asset('frontend/js/jquery.nicescroll.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range-slider.js')}}"></script>
    <script type="text/javascript">
        $(".js-range-slider").ionRangeSlider({
            type: "double",
            min: 0,
            max: 2000,
            from: 200,
            to: 1500,
            grid: false,
            prefix: "$"
        });
@endsection
