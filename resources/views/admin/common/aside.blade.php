<aside class="wrapping-aside" id="wrappingAside">

    <div class="aside-content">
        <div class="mb-3">
            <a href="{{route('admin.dashboard')}}" class="aside-nav-link @if($activeMenu == 'dashboard') active @endif">
                <span class="aside-nav-icon"><i class="icon-home"></i></span>
                <span class="aside-nav-text shrink-text-toggleable">{{__('app.dashboard')}}</span>
            </a>
        </div>


        <ul class="list-unstyled aside-nav-list aside-nav-list-slim">
            <li class="aside-nav-item toggle-item">
                <a href="#" class="aside-nav-link toggler toggle-icon">
                    <span class="aside-nav-icon"><i class="fa-brands fa-product-hunt"></i></span>
                    <span class="aside-nav-text shrink-text-toggleable">{{__('app.product')}}</span>
                </a>

                <div class="aside-nav-dropdown toggleable-content  @if($activeMenu == 'category' or $activeMenu == 'sub-category' || $activeMenu == 'product')  show @endif">
                    <ul class="list-unstyled aside-nav-list">
                        <li class="aside-nav-item">
                            <a href="{{route('category.index')}}" class="aside-nav-sublink @if($activeMenu == 'category')  active @endif">
                                <span class="aside-nav-icon"><i class="fa fa-circle-o"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.category')}}</span>
                            </a>
                        </li>
                        <li class="aside-nav-item">
                            <a href="{{route('sub-category.index')}}" class="aside-nav-sublink @if($activeMenu == 'sub-category') active @endif">
                                <span class="aside-nav-icon"><i class="fa fa-circle-o"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.sub_category')}}</span>
                            </a>
                        </li>
                        <li class="aside-nav-item">

                            <a href="{{route('product.index')}}" class="aside-nav-sublink @if($activeMenu == 'product') active @endif">
                                <span class="aside-nav-icon"><i class="fa fa-circle-o"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.product')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <ul class="list-unstyled aside-nav-list aside-nav-list-slim">
            <li class="aside-nav-item toggle-item">
                <a href="#" class="aside-nav-link toggler toggle-icon">
                    <span class="aside-nav-icon"><i class="fa-solid fa-cart-shopping"></i></span>
                    <span class="aside-nav-text shrink-text-toggleable">{{__('app.order')}}</span>
                </a>

                <div class="aside-nav-dropdown toggleable-content @if($activeMenu == 'pending' or $activeMenu == 'processing' or $activeMenu == 'completed' or $activeMenu == 'cancelled') show @endif ">
                    <ul class="list-unstyled aside-nav-list">
                        <li class="aside-nav-item">
                            <a href="{{route('order.pending')}}" class="aside-nav-sublink @if($activeMenu == 'pending') active @endif ">
                                <span class="aside-nav-icon"><i class="fa fa-circle-o"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.pending').' '.__('app.order')}}</span>
                            </a>
                        </li>
                        <li class="aside-nav-item">
                            <a href="{{route('order.processing')}}" class="aside-nav-sublink @if($activeMenu == 'processing') active @endif ">
                                <span class="aside-nav-icon"><i class="fa fa-circle-o"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.processing').' '.__('app.order')}}</span>
                            </a>
                        </li>
                        <li class="aside-nav-item">
                            <a href="{{route('order.completed')}}" class="aside-nav-sublink @if($activeMenu == 'completed') active @endif">
                                <span class="aside-nav-icon"><i class="fa fa-circle-o"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.completed').' '.__('app.order')}}</span>
                            </a>
                        </li>
                        <li class="aside-nav-item">

                            <a href="{{route('order.cancelled')}}" class="aside-nav-sublink @if($activeMenu == 'cancelled') active @endif">
                                <span class="aside-nav-icon"><i class="fa fa-circle-o"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.cancelled').' '.__('app.order')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
        <ul class="list-unstyled aside-nav-list aside-nav-list-slim">
            <li class="aside-nav-item toggle-item">
                <a href="#" class="aside-nav-link toggler toggle-icon">
                    <span class="aside-nav-icon"><i class="fa-solid fa-gear"></i></span>
                    <span class="aside-nav-text shrink-text-toggleable">{{__('app.setting')}}</span>
                </a>

                <div class="aside-nav-dropdown toggleable-content  @if($activeMenu == 'slide' or $activeMenu == 'user' or $activeMenu == 'advertisement' || $activeMenu == 'security')  show @endif">
                    <ul class="list-unstyled aside-nav-list">
                        <li class="aside-nav-item">
                            <a href="{{route('slider.index')}}" class="aside-nav-sublink @if($activeMenu == 'slide')  active @endif">
                                <span class="aside-nav-icon"><i class="fa-solid fa-sliders"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.slide')}}</span>
                            </a>
                        </li>
                        <li class="aside-nav-item">
                            <a href="{{route('advertisement.index')}}" class="aside-nav-sublink @if($activeMenu == 'advertisement')  active @endif">
                                <span class="aside-nav-icon"><i class="fa-solid fa-handshake"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.advertisement')}}</span>
                            </a>
                        </li>
                        <li class="aside-nav-item">
                            <a href="{{route('user.index')}}" class="aside-nav-sublink @if($activeMenu == 'user')  active @endif">
                                <span class="aside-nav-icon"><i class="fa-solid fa-users"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.user')}}</span>
                            </a>
                        </li>
                        <li class="aside-nav-item">
                            <a href="{{route('security.index')}}" class="aside-nav-sublink @if($activeMenu == 'security')  active @endif">
                                <span class="aside-nav-icon"><i class="fa-solid fa-lock"></i></span>
                                <span class="aside-nav-text shrink-text-toggleable">{{__('app.privacy_security')}}</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</aside>
