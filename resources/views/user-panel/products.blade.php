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
                <div class="col-lg-3">
                    <div class="mb-4 d-block d-lg-none">
                        <button class="btn btn-sm btn-dark rounded-0 mobail-filter-panel-toggler">{{__('app.filters')}}<i class="fa fa-filter" aria-hidden="true"></i></button>
                    </div>

                    <div class="filter-panel">
                        <button type="btn" class="mobail-filter-panel-remover"><i class="fa fa-times"></i></button>
                        <div class="filter-item mb-4">
                            <div class="filter-title">{{__('app.product').' '.__('app.types')}}</div>
                            <div class="p-3">
                                <ul class="list-unstyled m-0">
                                    @foreach($categories as $category)
                                        <li class="nav-item sliding-box mb-2">
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="text-muted">{{$category->name}}</a>
                                                <span class="sliding-toggler px-1 border"><i class="fa fa-angle-down mt-1"></i></span>
                                            </div>
                                            <div class="sliding-item ">
                                                @if($category->subCategory)
                                                    @foreach($category->subCategory as $subCat)
                                                        <a href="{{route('products.index',[$subCat->slug])}}" class="nav-link text-13 text-muted">{{$subCat->name}}</a>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>


                        <div class="filter-item mb-4">
                            <h4 class="filter-title">Brand</h4>
                            <div class="filter-body nicescroll">
                                <div class="form-check cute-check mb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">Topten <span class="text-muted">(20)</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="filter-item mb-4">
                            <h4 class="filter-title">Color</h4>
                            <div class="filter-body nicescroll">
                                <ul class="list-inline">
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #009933;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FCA53C;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #bf8040;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #F9334A;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FAEBD7;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FCCACD;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #ffff00;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #9999ff;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #009933;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #F9334A;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FAEBD7;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FCCACD;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FCA53C;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #bf8040;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #F9334A;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FAEBD7;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FCCACD;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FAEBD7;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #FCCACD;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #ffff00;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                    <li class="list-inline-item">
                                        <div class="color-filter-check cute-check">
                                            <label class="color-value" style="background-color: #9999ff;">
                                                <input type="checkbox">
                                            </label>
                                        </div>
                                    </li>
                                </ul>


                            </div>
                        </div>


                        <div class="filter-item mb-4">
                            <h4 class="filter-title">SIZE</h4>
                            <div class="filter-body nicescroll">
                                <div class="form-check cute-check mb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">{{__('app.small')}} <span class="text-muted">(20)</span>
                                    </label>
                                </div>
                                <div class="form-check cute-check mb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">X <span class="text-muted">(20)</span>
                                    </label>
                                </div>
                                <div class="form-check cute-check mb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">XL <span class="text-muted">(20)</span>
                                    </label>
                                </div>
                                <div class="form-check cute-check mb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">XLL <span class="text-muted">(20)</span>
                                    </label>
                                </div>

                                <div class="form-check cute-check mb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">L <span class="text-muted">(20)</span>
                                    </label>
                                </div>
                                <div class="form-check cute-check mb-1">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input">M <span class="text-muted">(20)</span>
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9">

                    <!-- ================ Start Body list grid ================= -->
                    <div class="pb-3">
                        <div class="d-flex flex-wrap border-bottom mb-4">
                            <div class="heading-title">
                                {{__('app.all').' '.__('app.product')}} <span class="text-muted text-12 px-1">(  {{$product->count()}}   {{__('app.items')}})</span>
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
                                                @foreach($subCategories as $subCategory)
                                                    @if($subCategory->product)
                                                        @foreach($subCategory->product as $product)
                                                <div class="col-sm-6 col-lg-4 mb-4">

                                                    <div class="product-item border">
                                                        <div class="product-img bg-white">
                                                            <img src="{{asset('product/'.$product->image)}}" data-id="{{$product->id}}" class="img-fluid mx-auto d-block click-product-like-unlike">
                                                            <a href="javascript:void(0)" data-id="{{$product->id}}" class="btn wishlist-btn  product-like-unlike product-{{$product->id}}  {{checkLike($product->id) === 'yes' ? 'active' : ''}}"><i class="fa fa-heart-o"></i></a>
                                                            <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                            <a href="{{route('productDetails',[$product->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                            <a href="javascript:void(0);"  data-slug="{{$product->slug}}" data-qty="1"   style="{{add_to_card_product($product->id) === 'yes' ? 'background:#19a719':''}}" class="overlay-add-cart add-to-card card-product{{$product->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($product->id) === 'yes' ? __('app.exists_product') : __('app.add').' '.__('app.to').' '.__('app.card')}}</a>
                                                        </div>
                                                        <div class="p-3">
                                                            <div id="product_title">
                                                                <a href="{{route('productDetails',[$product->slug])}}" class="d-block product-title text-muted">{{$product->title}}</a>
                                                            </div>
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
                                                        </div>
                                                    </div>
                                                </div>
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            </div>

                                        </div>
                                        <div class="tab-pane fade " id="listView">
                                            @foreach($subCategories as $subCategory)
                                                @if($subCategory->product)
                                                    @foreach($subCategory->product as $product)
                                            <div class="product-item mb-4 border">
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="product-img">
                                                            <img src="{{asset('product/'.$product->image)}}" data-id="{{$product->id}}" class="img-fluid mx-auto d-block click-product-like-unlike">
                                                            <a href="javascript:void(0)" data-id="{{$product->id}}"  class="btn wishlist-btn  product-like-unlike product-{{$product->id}}  {{checkLike($product->id) === 'yes' ? 'active' : ''}}"><i class="fa fa-heart-o"></i></a>
                                                            <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                            <a href="{{route('productDetails',[$product->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                            <a href="javascript:void(0)" data-slug="{{$product->slug}}" data-qty="1"   style="{{add_to_card_product($product->id) === 'yes' ? 'background:#19a719':''}}" class="overlay-add-cart add-to-card card-product{{$product->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($product->id) === 'yes' ? __('app.exists_product') : __('app.add').' '.__('app.to').' '.__('app.card')}} </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-8">
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
                                                    @endif
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
        @if(session('error'))
        alert('Product already added to cart');
        @endif
{{--        @if(session('success'))--}}
{{--        alert('Product has been added successfully');--}}
{{--        @endif--}}
    </script>
    <script src=''></script>
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
