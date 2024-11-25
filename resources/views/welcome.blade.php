@extends('layouts.frontent')
@section('content')
    <div class="container">
        <div class="row no-gutters">
            <div class="col-lg-3 mb-4 position-relative">
                <div class="category-box category-box-home">
                    <div class="category-menu">
                        <button type="btn" class="sm-category-toggler"><img src="{{asset('frontend/images/icon/close.svg')}}" class="img-fluid"></button>
                        <ul class="list-unstyled m-0 category-menu-list">
                            @foreach($categories as $category)
                                <li><a href="{{route('productByCategory',[$category->slug])}}"><i class="fa fa-circle-o"></i> {{$category->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn btn-sm rounded-0 btn-block all-load">
                        <span> Show All</span> <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </button>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <!--================= The slideshow =================-->
                <div id="demo" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @foreach($slides as $key=>$slide)
                        <div class="carousel-item {{$key==0?'active':''}}">
                            <div class="ratio-4x3">
                                <img src="{{asset('product/'.$slide->image)}}" alt="banner 1" class="ratio-item">
                            </div>
                            <div class="carousel-caption text-left">
                                <h1 class="text-bold text-uppercase">Up To {{$slide->discount}}% off</h1>
                                <p class="mb-2 text-20">{{$slide->name}}</p>
                                <a href="#" class="btn btn-radical-red rounded-0">{{__('app.shop').' '.__('app.now')}}</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 mb-4">
                <div class="h-100">
                    <div class="row">
                       @foreach($adds as $add)
                            <div class="col-sm-6 col-lg-12 mb-4 mb-lg-0">
                                <div class="ratio-4x3">
                                    <a href="#"><img style="width:100%;" src="{{asset('product/'.$add->image)}}" class="ratio-item"></a>
                                </div>
                            </div>
                       @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ================= End Block ================= -->


    <!-- ================ Start Block ===================== -->
    <div class="container">
        <div class="bg-light-white p-3 p-lg-4 border">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="d-flex px-lg-4 border-lg-right">
                        <div class="pr-3 text-24">
                            <i class="fa fa-ambulance" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="m-0 text-17 text-strong text-muted text-uppercase">{{__('app.free').' '.__('app.shipping')}}</h3>
                            <p class="m-0 text-13">{{__('app.on').' '.__('app.order').' '.__('app.over')}}${{__('app.200')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="d-flex px-lg-4 border-lg-right">
                        <div class="pr-3 text-24">
                            <i class="fa fa-usd" aria-hidden="true"></i>
                        </div>
                        <div>
                            <h3 class="m-0 text-17 text-strong text-muted text-uppercase">30-{{__('app.day').' '.__('app.return')}}</h3>
                            <p class="m-0 text-13">{{__('app.money').__('app.back').' '.__('app.guaranty')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="d-flex px-lg-4 border-lg-right">
                        <div class="pr-3 text-24">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div>
                            <h3 class="m-0 text-17 text-strong text-muted text-uppercase">24/7 {{__('app.support')}}</h3>
                            <p class="m-0 text-13"> {{__('app.online').' '.__('app.consultations')}}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="d-flex px-lg-4">
                        <div class="pr-3 text-24">
                            <i class="fa fa-clock-o"></i>
                        </div>
                        <div>
                            <h3 class="m-0 text-17 text-strong text-muted text-uppercase">{{__('app.safe').' '.__('app.shopping')}}</h3>
                            <p class="m-0 text-13">{{__('app.safe').' '.__('app.guarantee')}}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ====================== End Block ======================= -->


    <!-- ================= Start Block =================== -->
    <div class="py-5">
        <div class="container" >
            <div class="row">
                <div class="col-md-8 col-lg-9">
                    <div class="mb-4 owl-carousel-tab">
                        <!-- ======== Start Tabs ======== -->
                        <div class="pb-3">
                            <ul class="nav nav-tabs featured-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#featuredProduct">{{__('app.featured').' '.__('app.product')}}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#latestProduct">{{__('app.latest').' '.__('app.products')}}</a>
                                </li>
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" data-toggle="tab" href="#onSale">On Sale</a>--}}
{{--                                </li>--}}
                            </ul>
                        </div>
                        <div class="tab-content" >
                            <div class="tab-pane fade show active" id="featuredProduct">
                                <div class="position-relative">
                                    <div class="owl-carousel owl-carousel-3">

                                        @foreach($featured as $product)
                                                <div class="item">
                                                    <div class="h-100 product-item">
                                                        <div class="product-img">
                                                            <img src="{{asset('product/'.$product->image)}}" data-id="{{$product->id}}" class="img-fluid mx-auto d-block click-product-like-unlike">
                                                            <a href="javascript:void(0)" data-id="{{$product->id}}" class="btn wishlist-btn product-like-unlike product-{{$product->id}}  {{checkLike($product->id) === 'yes' ? 'active' : ''}}"><i class="fa fa-heart-o"></i></a>
                                                            <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                            <a href="{{route('productDetails',[$product->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                            <a href="javascript:void(0);" data-slug="{{$product->slug}}" data-qty="1"  style="{{add_to_card_product($product->id) === 'yes' ? 'background:#19a719':''}}" class="overlay-add-cart add-to-card card-product{{$product->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($product->id) === 'yes' ? __('app.exists_product') : __('app.add').' '.__('app.to').' '.__('app.card')}}</a>
                                                        </div>
                                                        <div class="py-3">
                                                            <div id="product_title">
                                                                <a href="{{route('productDetails',[$product->slug])}}" class="d-block product-title text-muted">{{$product->title}}</a>
                                                            </div>
                                                            <div class="d-flex justify-content-between">
                                                                <span class="text-bold text-20 text-radical-red">৳{{$product->price}}</span>
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
                            </div>

                            <div class="tab-pane  " id="latestProduct">
                                <div class="position-relative">
                                    <div class="owl-carousel owl-carousel-3">
                                        @foreach($products as $product)
                                        <div class="item">
                                            <div class="h-100 product-item">
                                                <div class="product-img">
                                                    <img src="{{asset('product/'.$product->image)}}" data-id="{{$product->id}}" class="img-fluid mx-auto d-block click-product-like-unlike">
                                                    <a href="javascript:void(0)" data-id="{{$product->id}}" class="btn wishlist-btn product-like-unlike product-{{$product->id}}  {{checkLike($product->id) === 'yes' ? 'active' : ''}}"><i class="fa fa-heart-o"></i></a>
                                                    <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                    <a href="{{route('productDetails',[$product->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                    <a href="javascript:void(0);" data-slug="{{$product->slug}}" data-qty="1" style="{{add_to_card_product($product->id) === 'yes' ? 'background:#19a719':''}}" class="overlay-add-cart add-to-card card-product{{$product->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($product->id) === 'yes'?__('app.exists_product'):__('app.add').' '.__('app.to').' '.__('app.card')}}</a>
                                                </div>
                                                <div class="py-3">
                                                    <div id="product_title">
                                                        <a href="{{route('productDetails',[$product->slug])}}" class="d-block product-title text-muted">{{$product->title}}</a>
                                                    </div>
                                                    <div class="d-flex justify-content-between">
                                                        <span class="text-bold text-20 text-radical-red">৳{{$product->price}}</span>
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
                            </div>
                        </div>
                        <!-- ================ End Tab ===================== -->
                    </div>
                </div>
                <div class="col-md-4 col-lg-3">
                    <div class="h-100">
                        <div class="mb-4">
                            <div class="category-widget">
                                <div class="widget-title">
                                    <h3 class="text-bold text-uppercase text-14">{{__('app.categories')}}</h3>
                                </div>
                                <div class="py-2 category-widget-list">
                                    <ul class="list-unstyled m-0">
                                        @foreach($categories as $category)
                                            <li class="nav-item sliding-box mb-2">
                                                <div class="d-flex justify-content-between">
                                                    <a href="#" class="text-muted">{{$category->name}}</a>
                                                    <span class="sliding-toggler px-1 border"><i class="fa fa-angle-down mt-1"></i></span>
                                                </div>
                                                <div class="sliding-item text-primary">
                                                    @if($category->subCategory)
                                                        @foreach($category->subCategory as $subCat)
                                                                <a href="{{route('products.index',[$subCat->slug])}}" class="nav-link text-13 text-muted text-primary">{{$subCat->name}}</a>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ==================== End Block ================== -->




    <!-- =================== Start Block ======================= -->
    <div class="bg-light-white py-5">
        <div class="container"  id="arrivalProduct">

            <div class="mb-5 owl-carousel-fill-tab tab-fill-eucaliptus bg-white">
                <!-- ======== Start Tabs ======== -->
                <div class="fill-tab">
                    <div class="fill-tab-title">
                        Digital
                    </div>
                    <ul class="nav nav-tabs  flex-column flex-md-row" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#mostViewStage2">{{__('app.most').' '.__('app.view')}}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#newArrivalStage2">{{__('app.new').' '.__('app.arrival')}}</a>
                        </li>
                    </ul>
                </div>
                <!-- ======== Slice Banner ========= -->
                <div class="d-flex">
                    <div class="w-50">
                        <img src="{{asset('frontend/images/slice-banner1.jpg')}}" class="img-fluid">
                    </div>
                    <div class="w-50">
                        <img src="{{asset('frontend/images/slice-banner2.jpg')}}" class="img-fluid">
                    </div>
                </div>

                <div class="tab-content" >
                    <div class="tab-pane fade show active" id="mostViewStage2">
                        <div class="row no-gutters">
                            <div class="col-md-4 col-lg-2 d-none d-md-block">
                                <div class="fill-image h-100">
                                    <img src="{{asset('frontend/images/fill-img-eucaliptus.png')}}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-10">
                                <div class="position-relative">
                                    <div class="owl-carousel owl-carousel-5-no-gutters">
                                        @foreach($views as $view)
                                            <div class="item">
                                                <div class="h-100 product-item">
                                                    <div class="product-img-sm">
                                                        <img src="{{asset('product/'.$view->image)}}" data-id="{{$view->id}}" class="img-fluid mx-auto d-block click-product-like-unlike">
                                                        <a href="javascript:void(0)" data-id="{{$view->id}}" class="btn wishlist-btn  product-like-unlike product-{{$view->id}}  {{checkLike($view->id) === 'yes' ? 'active' : ''}}"><i class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                        <a href="{{route('productDetails',[$view->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0);" data-slug="{{$view->slug}}" data-qty="1" style="{{add_to_card_product($view->id) === 'yes' ? 'background:#19a719;':''}}" class="overlay-add-cart add-to-card card-product{{$view->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($view->id) === 'yes'?__('app.exists_product'):__('app.add').' '.__('app.to').' '.__('app.card')}} </a>
                                                    </div>
                                                    <div class="pt-3 px-2">
                                                        <div id="product_title">
                                                            <a href="{{route('productDetails',[$view->slug])}}" class="d-block product-title text-muted">{{$view->title}}</a>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <span class="text-bold text-20 text-radical-red">${{$view->price}}</span>
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
                            </div>
                        </div>

                    </div>


                    <div class="tab-pane" id="newArrivalStage2">
                        <div class="row no-gutters">
                            <div class="col-md-4 col-lg-2 d-none d-md-block">
                                <div class="fill-image h-100">
                                    <img src="{{asset('frontend/images/fill-img.png')}}" class="img-fluid">
                                </div>
                            </div>
                            <div class="col-md-8 col-lg-10" id="newArrivalPosition">
                                <div class="position-relative">
                                    <div class="owl-carousel owl-carousel-5-no-gutters">
                                        @foreach($arrival as $arrive)
                                            <div class="item">
                                                <div class="h-100 product-item">
                                                    <div class="product-img-sm">
                                                        <img src="{{asset('product/'.$arrive->image)}}" data-id="{{$arrive->id}}" class="img-fluid mx-auto d-block click-product-like-unlike">
                                                        <a href="javascript:void(0)" data-id="{{$arrive->id}}" class="btn wishlist-btn  product-like-unlike product-{{$arrive->id}}  {{checkLike($arrive->id) === 'yes' ? 'active' : ''}}"><i class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                        <a href="{{route('productDetails',[$arrive->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0);" data-slug="{{$arrive->slug}}" data-qty="1" style="{{add_to_card_product($arrive->id) === 'yes' ? 'background:#19a719;':''}}" class="overlay-add-cart add-to-card card-product{{$arrive->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($arrive->id) === 'yes'?__('app.exists_product'):__('app.add').' '.__('app.to').' '.__('app.card')}}</a>
                                                    </div>
                                                    <div class="pt-3 px-2">
                                                        <div id="product_title">
                                                            <a href="{{route('productDetails',[$arrive->slug])}}" class="d-block product-title text-muted">{{$arrive->title}}</a>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <span class="text-bold text-20 text-radical-red">৳{{$arrive->price}}</span>
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
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ================ End Tab ===================== -->
            </div>

        </div>
    </div>
    <!-- =================== End Block ======================== -->

@endsection




