@extends('layouts.frontent')
@section('css')
    @endsection
@section('content')
    <div class="container">
        <div class="direction py-3">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{url('/')}}" class="text-radical-red">{{__("app.home")}} <i class="fa fa-angle-right pl-1"></i></a>
                </li>
                <li class="list-inline-item">
                    <a href="{{route('products.index',[$product->subCategory ? $product->subCategory->slug:''])}}" class="text-radical-red">{{__('app.product')}} <i class="fa fa-angle-right pl-1"></i></a>
                </li>
                <li class="list-inline-item">
                    <span>{{$product->name}}</span>
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
                    <div class="filter-panel d-none d-lg-block">
                        <div class="filter-item mb-4">
                            <div class="filter-title">{{__('app.product').' '.__('app.type')}}</div>
                            <div class="p-3">
                                <ul class="list-unstyled m-0">
                                    @foreach($subCategories as $subCategory)
                                        <li class="nav-item sliding-box mb-2">
                                            <div class="d-flex justify-content-between">
                                                <a href="#" class="text-muted">{{$subCategory->name}}</a>
                                                <span class="sliding-toggler px-1 border"><i class="fa fa-angle-down mt-1"></i></span>
                                            </div>
                                            <div class="sliding-item">
                                                @if($subCategory->product)
                                                    @foreach($subCategory->product as $productType)
                                                        <a href="{{route('productDetails',[$productType->slug])}}" class="nav-link text-13 text-muted">{{$productType->name}}</a>
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

                <div class="col-lg-9">
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <div class="mb-4">

                                    <div class="primary-img-box mb-3">
                                        <img src="{{asset('product/'.$product->image)}}" class="img-fluid">

                                    </div>

                                    <div class="Sub-img-box">
                                        <ul class="list-unstyled row">
                                            <li class="col-3 mb-3 active">
                                                <div class="ratio-vertics">
                                                    <img src="{{asset('product/'.$product->image)}}" class="img-fluid">
                                                </div>
                                            </li>
                                            @if($product->ProductImage)
                                                @foreach($product->ProductImage as $subCat)
                                            <li class="col-3 mb-3">
                                                <div class="ratio-vertics">
                                                    <img src="{{asset('product/'.$subCat->image)}}" class="img-fluid">
                                                </div>
                                            </li>
                                                @endforeach
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4">
                                <div class="border-bottom mb-4">
                                    <h3 class="text-muted">{{$product->title}}</h3>
                                    <div class="d-flex justify-content-between">
                                        <span class="text-bold text-20 text-radical-red">$<span  id="totalPrice">{{number_format($product->price, 2)}}</span></span>
                                        <div class="d-flex text-13 text-light-orange mt-2">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <p class="mb-1 text-primary">{{__('app.unit').' '.__('app.price')}} : <span class="text-danger">${{number_format($product->price, 2)}}</span></p>
                                    <p class="mb-1">{{__('app.product').' '.__('app.id')}} : <span class="text-muted">#{{$product->id*$product->id*$product->id}}</span></p>
                                    <p class="mb-1">{{__('app.availability')}} : <span class="text-success"> In stock</span></p>
                                    <p class="mb-1">{{__('app.condition')}} : <span class="text-muted"> {{__('app.new')}}</span></p>
                                    <div class="d-flex py-2">
                                        <div class="mr-2">
                                            <p class="mb-0 text-bold">{{__('app.tags')}} : </p>
                                        </div>
                                        <div>
                                        </div>
                                    </div>

                                    <div class="pb-3 d-flex">
                                        <p class="mb-0 mr-2">{{__('app.color')}} : </p>
                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="#" class="details-color-item" style="background-color: #009933;"></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="details-color-item" style="background-color: #ff6600;"></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="details-color-item" style="background-color: #ff3366;"></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="details-color-item" style="background-color: #ff0000;"></a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="#" class="details-color-item" style="background-color: #000000;"></a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="d-flex mb-3">
                                        <p class="mb-0 mr-2 text-nowrap">{{__('app.quantity')}} : </p>
                                        <div class="quantity-box d-flex mr-3">
                                            <input type="number" id="count" name="quantity" value="1" min="1" class="form-control form-control-sm quantity">
                                            <div>
                                                <button class="btn cart-qty-plus" id="increase">
                                                    <span class="text"><i class="fa fa-angle-up"></i></span>
                                                </button>
                                                <button class="btn cart-qty-minus" id="decrease">
                                                    <span class="text"><i class="fa fa-angle-down"></i></span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3 d-flex">
                                        <p class="mb-0 mr-2 text-nowrap">{{__('app.size')}} : </p>
                                        <select class="form-control form-control-sm w-150px rounded-0">
                                            <option>{{__('app.select').' '.__('app.size')}}</option>
                                            <option selected="selected">XL</option>
                                            <option>L</option>
                                            <option>M</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap">
                                    <div class="mb-2 mr-3">
                                        <button type="button" id="add_to_card_submit_button" style="{{add_to_card_product($product->id) === 'yes' ? 'background:#19a719':''}}" class="btn btn-sm btn-radical-red rounded-0 add-to-card-submit-detail-page"><i class="icon-basket"></i>{{ add_to_card_product($product->id) === 'yes' ? __('app.exists_product') : __('app.add').' '.__('app.to').' '.__('app.card')}}</button>
                                    </div>
                                    <div class="mb-2 mr-3">
                                        <a href="#" class="btn btn-sm rounded-0 wishlist-btn"><i class="fa fa-heart-o"></i></a>
                                        <span class="text-13 text-muted">{{__('app.wishlist')}}</span>
                                    </div>
                                    <div class="mb-2 mr-3">
                                        <a href="#" class="btn btn-sm rounded-0 compare-btn"><i class="fa fa-balance-scale"></i></a>
                                        <span class="text-13 text-muted">{{__('app.compare')}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mb-5 border">
                        <div class="tab-fill-radical mb-4">
                            <div class="fill-tab">
                                <ul class="nav nav-tabs flex-column flex-md-row" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active show" data-toggle="tab" href="#productDetails">{{__('app.product').' '.__('app.details')}}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="productDetails">
                                <div class="p-3">
                                    <p>{{$product->details}}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ================= Start Related Product =================== -->

                    <div class="mb-4 owl-carousel-tab" id="relatedPosition">
                        <div class="border-bottom mb-3">
                            <p class="mb-2 text-bold text-uppercase">{{__('app.related').' '.__('app.products')}}</p>
                        </div>
                        <div class="position-relative">
                            @if (session('already_exists'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('already_exists') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                            <div class="owl-carousel owl-carousel-3">
                                @foreach($subCategories as $subCat)
                                    @if($subCat->product)
                                        @foreach($subCat->product as $related)
                                            <div class="item">
                                                <div class="h-100 product-item">
                                                    <div class="product-img" id="product-{{$related->slug}}">
                                                        <img src="{{asset('product/'.$related->image)}}" data-id="{{$related->id}}" class="img-fluid mx-auto d-block click-product-like-unlike">
                                                        <a href="javascript:void(0)"  data-id="{{$related->slug}}"  class="btn wishlist-btn product-like-unlike product-{{$related->id}}  {{checkLike($related->id) === 'yes' ? 'active' : ''}}"><i class="fa fa-heart-o"></i></a>
                                                        <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                        <a href="{{route('productDetails',[$related->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                        <a href="javascript:void(0);"  data-slug="{{$related->slug}}" data-qty="1"  style="{{add_to_card_product($related->id) === 'yes' ? 'background:#19a719':''}}" class="overlay-add-cart add-to-card card-product{{$related->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($related->id) === 'yes' ? __('app.exists_product') : __('app.add').' '.__('app.to').' '.__('app.card')}}</a>
                                                    </div>
                                                    <div class="py-3">
                                                        <div id="product_title">
                                                            <a href="{{route('productDetails',[$related->slug])}}" class="d-block product-title text-muted">{{$related->title}}</a>
                                                        </div>
                                                        <div class="d-flex justify-content-between">
                                                            <span class="text-bold text-20 text-radical-red">${{number_format($related->price)}}</span>
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
                    </div>

                    <!-- ================== End Related Product =================== -->


                    <!-- ========= Also Like Product ============== -->
                    <div class="mb-4 owl-carousel-tab" >
                        <div class="border-bottom mb-3">
                            <p class="mb-2 text-bold text-uppercase">You may also like</p>
                        </div>
                        <div class="position-relative" id="EveryProductPosition">
                            <div class="owl-carousel owl-carousel-3">
                                @foreach($allProducts as $products)
                                    <div class="item">
                                        <div class="h-100 product-item">
                                            <div class="product-img" id="product-{{$products->slug}}">
                                                <img src="{{asset('product/'.$products->image)}}" data-id="{{$products->id}}" class="img-fluid mx-auto d-block click-product-like-unlike"/>
                                                <a href="javascript:void(0)" id="likesProduct" data-id="{{$products->id}}" class="btn wishlist-btn  product-like-unlike product-{{$products->id}} {{checkLike($products->id) === 'yes' ? 'active' : ''}}"><i class="fa fa-heart-o"></i></a>
                                                <a href="#" class="btn compare-btn"><i class="fa fa-balance-scale"></i></a>
                                                <a href="{{route('productDetails',[$products->slug])}}" class="btn quick-view"><i class="fa fa-eye"></i></a>
                                                <a href="javascript:void(0);" data-slug="{{$products->slug}}" data-qty="1"  style="{{add_to_card_product($products->id) === 'yes' ? 'background:#19a719':''}}" class="overlay-add-cart add-to-card card-product{{$products->slug}}"><i class="icon-basket"></i>{{ add_to_card_product($products->id) === 'yes' ? __('app.exists_product') : __('app.add').' '.__('app.to').' '.__('app.card')}}</a>
                                            </div>

                                            <div class="py-3">
                                                <div id="product_title">
                                                    <a href="{{route('productDetails',[$products->slug])}}" class="d-block product-title text-muted">{{$product->title}}</a>
                                                </div>
                                                <div class="d-flex justify-content-between">
                                                    <span class="text-bold text-20 text-radical-red">${{number_format($products->price,2)}}</span>
                                                    <div class="d-flex text-13 text-light-orange mt-2" >
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
    </div>
    <!-- ================ End Block =============== -->
@endsection

@section('js')
    <script>
        $(document).on('click','#increase',function (){

                let quantity = $('#count').val();
                let price = {{$product->price}};
                $('#totalPrice').html(price*quantity);
            });
        $(document).on('click','#decrease',function (){

            let quantity = $('#count').val();
            let price = {{$product->price}};
            $('#totalPrice').html(price*quantity);
        });
    </script>
    <script>
        $(document).ready(function (){
            $('#add_to_card_submit_button').click(function (){
                let qty = $('#count').val();
                let slug = '{{$product->slug}}';
                let base_url = $('#base_url').val();
                $(this).text('...loading...');
                $.ajax({
                    url:base_url+'/add-to-card/'+slug+'/'+qty,
                    type:'GET',
                    success:function (response){

                        if(response.status === 404){
                            $('.add-to-card-submit-detail-page').html("{{__('app.exists_product')}}").css({
                                'background':'yellow',
                            })
                        } else if (response.status === 200){
                            $('.add-to-card-submit-detail-page').html("{{__('app.exists_product')}}").css({
                                'background': 'green'
                            });
                            location.reload()
                        }

                    },
                });
                $(this).text('{{__('app.add').' '.__('app.to').' '.__('app.card')}}')
            });
        });


    </script>
@endsection

