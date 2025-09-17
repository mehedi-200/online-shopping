<nav class="navbar navbar-expand-lg topbar">
    <div class="container">
        <button type="button" class="navbar-toggler text-muted text-14" data-toggle="collapse" data-target="#topLeftHeader"><i class="fa fa-ellipsis-v"></i></button>
        <div class="collapse navbar-collapse" id="topLeftHeader">
            <div class="topbar-left-menu">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a href="#" class="nav-link"><i class="fa fa-phone pr-1"></i> 00-62-658-658</a>
                    </li>
                    <li class="nav-item active">
                        <a href="#" class="nav-link"><i class="fa fa-envelope pr-1"></i> Contact us today !</a>
                    </li>
                    <li class="nav-item active">
                        <select class="custom-select">
                            <option value="1">$ USD</option>
                            <option value="2">&#8364; EURO</option>
                        </select>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                            <img src="{{asset('frontend/images/flags/en.png')}}" class="flag-small"><span class="pl-1">ENGLISH</span>
                        </a>
                        <div class="dropdown-menu lang-drop">
                            <a class="dropdown-item" href="#"><img src="{{asset('frontend/images/flags/en.png')}}" class="flag-small"><span class="pl-1">ENGLISH</span></a>
                            <a class="dropdown-item" href="#"><img src="{{asset('frontend/images/flags/flag2.jpg')}}" class="flag-small"><span class="pl-1">FRENCH</span></a>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="ml-lg-auto topbar-right-menu">
                <ul class="navbar-nav list-unstyled m-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#">MY ACCOUNT</a>
                        <div class="dropdown-menu p-2 p-lg-0">
                            <ul class="list-unstyled m-0">
                                <li class="nav-item dropdown">
                                    <a class="nav-link" href="#">COMPARE</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">MY WISHLIST</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">BLOG</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Contact</a>
                                </li>

                            </ul>
                        </div>
                    </li>
                    @if (Route::has('login'))
                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                            </li>
                        @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">login</a>
                    </li>
                            @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Registration</a>
                    </li>
                            @endif
                        @endauth
                    @endif

                </ul>

            </div>
        </div>
    </div>
</nav>
<!-- ================= End  Topbar ================== -->



<!-- ================== Header ======================= -->
<nav class="navbar navbar-expand-lg header">
    <div class="container position-relative py-3">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{asset('frontend/images/logo.png')}}" class="img-fluid d-block"></a>
        <div class="primary-search-box">
            <form class="my-2 my-lg-0">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <select class="custom-select d-none d-lg-block">
                            <option>All Category</option>
                            <option>Small select</option>
                            <option>Small select</option>
                            <option>Small select</option>
                        </select>

                    </div>
                    <input type="text" class="form-control" placeholder="Search ....">
                    <button class="btn" type="submit"><i class="fa fa-search"></i></button>
                </div>
            </form>
        </div>
        <div class="nav-item active d-flex d-lg-none">
            <div class="header-search-box d-flex d-lg-block  ml-auto ml-lg-0">
                <a href="javascript:void(0);" class="btn primary-search-box-toggler d-block d-lg-none"><i class="fa fa-search"></i></a>
            </div>
            <button type="button" class="navbar-toggler toggler-animation animation-bar-box collapsed mt-2" data-toggle="collapse" data-target="#menubarMenu">
                <span class="animate-bar"></span>
                <span class="animate-bar"></span>
                <span class="animate-bar"></span>
            </button>
        </div>


        <div class="d-block d-lg-flex w-lg-down-100">
            <ul class="list-unstyled mt-2 mb-0 mt-lg-0">
                <li class="nav-item dropdown">
                    <a class="header-minicart" href="javascript:void(0)"  data-toggle="dropdown">
							<span class="header-minicart-qty">
								<strong class="d-block">{{__('app.shopping').' '.__('app.cart')}}</strong>
								<span id="shopping_notification_card_total_price_and_count_on_header">
									{{addToCart()->count()}} {{__('app.items')}} - ${{number_format(totalCartAmount(), 2)}}
								</span>
							</span>
                        <span class="header-minicart-icon">
								<i class="icon-basket text-20"></i>
								<span class="cart-item-badge" id="shopping_notification_card_total_pd_count_only_on_header">{{addToCart()->count()}}</span>
							</span>
                    </a>
                    <div class="dropdown-menu header-cart-dropdown">
                        <div class="d-flex justify-content-between border-bottom mb-2">
                            <span class="m-0 py-2 text-uppercase text-12 text-bold" id="shopping_notification_card_total_pd_count_with_items_only_on_header">{{addToCart()->count()}} {{__('app.items')}}</span>
                            <a href="#" class="m-0 py-2 text-uppercase text-12 text-bold">{{__('app.view').' '.__('app.cart')}}</a>
                        </div>
                        <ul class="list-unstyled m-0" id="single_pdName_for_shopping_notification">
                            @php
                            $total = 0;
                             @endphp
                            @foreach(addToCart() as $cart)
                                <li class="header-cart-item">
                                    <div class="header-cart-title">
                                        <a href="#" >{{$cart->product ? $cart->product->name:''}}</a>
                                        <span >{{$cart->total_price}}</span>
                                    </div>
                                    <div class="header-cart-img">
                                        <a href="#"><img  src="{{asset('product/'. $cart->product->image)}}"></a>
                                    </div>
                                    <a href="javascript:void(0)" data-id="{{$cart->product_id}}" id="ididid" class="header-cart-item-remover text-danger delete-purchase-item"><i class="fa fa-times"></i></a>
                                </li>
                                    @php
                                    $total +=$cart->total_price;
                                    @endphp

                            @endforeach
                        </ul>
                        <div class="d-flex justify-content-between mb-2">
                            <span class="m-0 py-2 text-uppercase text-bold">{{__('app.total')}}</span>
                            <span class="m-0 py-2 text-uppercase text-bold" id="shopping_notification_card_total_price_on_header">${{number_format($total, 2)}}</span>
                        </div>
                        <div class="py-2">
                            <a href="{{route('ViewCartProduct')}}" class="btn btn-dark header-cart-checkout-btn">{{__('app.view').' '.__('app.cart')}}</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- ================= header ========================= -->






<!-- ================= Start Menubar ================= -->
<nav class="bg-light-white py-0">
    <div class="container">
        <div class="menubar d-lg-flex">
            <div class="category-toggler col-lg-3 ">
                <!-- <a href="javascript:void(0)" class="nav-link collapsed d-none d-lg-flex">
                    <span class="mr-2">Categories</span>
                    <span>
                        <i class="fa fa-angle-left"></i>
                    </span>
                </a> -->
                <a href="javascript:void (0)" class="nav-link mobail-category-toggler">
                    <span class="mr-2">{{__('app.category')}}</span>
                    <span>
                        <i class="fa fa-angle-right"></i>
                    </span>
                </a>
                <div class="category-box category-box-inner">
                    <div class="category-menu">
                        <button type="btn" class="sm-category-toggler"><img src="images/icon/close.svg" class="img-fluid"></button>
                        <ul class="list-unstyled m-0 category-menu-list">
                            @foreach(allCategory() as $cat)
                                <li><a href="{{route('productByCategory',[$cat->slug])}}"><i class="fa fa-mobile"></i>{{$cat->name}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                    <button type="button" class="btn btn-sm rounded-0 btn-block all-load">
                        <span> Show All</span> <i class="fa fa-caret-down" aria-hidden="true"></i>
                    </button>
                </div>

            </div>
            <div class="navbar navbar-expand-lg p-0 w-100">
                <div class="collapse navbar-collapse menubar-menu" id="menubarMenu">
                    <ul class="navbar-nav active">
                        <li class="nav-item @if(!isset($page_title)) @else active @endif">
                            <a href="{{route('productsByProduct')}}" class="nav-link mobail-category-toggler ">
                                {{__('app.products')}}
                            </a>
                        </li>
                        @foreach(category() as $cat)
                            <li class="nav-item">
                            <a href="#" class="nav-link">{{$cat->name}}</a>
                            <div class="dropdown-menu menubar-bigdropdown">
                                <div class="row">
                                    @if($cat->subCategory)
                                        @foreach( $cat->subCategory->sortByDesc('id')->take(4) as $subCat)
                                    <div class="col-md-6 col-xl-3 mb-4">
                                        <a href="{{route('products.index',[$subCat->slug])}}">
                                            <div class="pb-3 category-img" >
                                                <img src="{{asset('product/'.$subCat->image)}}" style="margin:auto" class="img-fluid d-block">
                                            </div>
                                            <ul class="list-unstyled list-submenu " >
                                                <li class="fs-bold ms-5" ><a href="#" class="text-center">{{$subCat->name}}</a></li>
                                            </ul>
                                        </a>
                                    </div>

                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>

<!-- ================= End Menubar ================= -->
