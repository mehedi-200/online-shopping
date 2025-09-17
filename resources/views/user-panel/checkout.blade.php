@extends('layouts.frontent')
@section('css')
<link rel="shylesheet" href="{{asset('product.css')}}"/>
@endsection
@section('content')
    <div class="container" style="overflow: hidden;">
        <div class="direction py-3">
            <ul class="list-inline">
                <li class="list-inline-item">
                    <a href="{{url('/')}}" class="text-radical-red">{{__('app.home')}} <i class="fa fa-angle-right pl-1"></i></a>
                </li>
                <li class="list-inline-item">
                    <span>{{__('app.checkout')}}</span>
                </li>
            </ul>
        </div>
{{--        <div class="checkout-method">--}}
{{--            <div class="border p-4 mb-4">--}}
{{--                <h3>{{__('app.checkout_as_a_guest_register')}}</h3>--}}
{{--                <p>{{__('app.register_with_us_for_future_convenience')}}</p>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div>--}}
{{--                            <div class="reg-type p-3">--}}
{{--                                <div>--}}
{{--                                    <label class="text-bold">--}}
{{--                                        <input type="radio" name="userType" class="member-area" @if(session('email_not_exists') or session('pwd_not_matched') or session('no_product_added')   ) checked @endif>--}}
{{--                                        {{__('app.member').' '.__('app.checkout')}}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div>--}}
{{--                                    <label class="text-bold">--}}
{{--                                        <input type="radio" name="userType" class="guest-area">--}}
{{--                                        {{__('app.checkout_as_a_guest')}}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <p class="text-20">{{__('app.register_and_save_time')}}</p>--}}
{{--                            <p><i class="fa fa-check-circle text-radical-red"></i> {{__('app.fast_and_easy_checkout')}}</p>--}}
{{--                            <p><i class="fa fa-check-circle text-radical-red"></i> {{__('app.easy_access_to_your_order_history_and_status')}}</p>--}}
{{--                            <a href="#" class="btn btn-radical-red rounded-0 px-4">{{__("app.continue")}}</a>--}}
{{--                            <a href="{{route('payWithPaypal', [14])}}" class="btn btn-radical rounded-0 px-4 bg-success text-white">{{__("app.papalPayment")}}</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6">--}}
{{--                        <div class="member-login">--}}
{{--                            @if (session('no_product_added'))--}}
{{--                                <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                                    {{ session('no_product_added') }}--}}
{{--                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            @if (session('email_not_exists'))--}}
{{--                                <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                                    {{ session('email_not_exists') }}--}}
{{--                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            @if (session('pwd_not_matched_log_in'))--}}
{{--                                <div class="alert alert-danger alert-dismissible fade show" role="alert">--}}
{{--                                    {{ session('pwd_not_matched_to_login') }}--}}
{{--                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>--}}
{{--                                </div>--}}
{{--                            @endif--}}
{{--                            <form action="{{route('placeOrderByLogin')}}" method="GET">--}}
{{--                                @csrf--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="email" class="text-bold">{{__('app.email').' '.__('app.address')}}:</label>--}}
{{--                                    <input type="email" name="email" value="{{old('email')}}" class="form-control rounded-0" placeholder="{{__('app.email').' '.__('app.address')}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group">--}}
{{--                                    <label for="pwd" class="text-bold">{{__('app.password')}}:</label>--}}
{{--                                    <input type="password" class="form-control rounded-0"  name="password" minlength="8" placeholder="{{__('app.password')}}">--}}
{{--                                </div>--}}
{{--                                <div class="form-group form-check cute-check">--}}
{{--                                    <label class="form-check-label">--}}
{{--                                        <input class="form-check-input" type="checkbox"> {{__('app.remember_me')}}--}}
{{--                                    </label>--}}
{{--                                </div>--}}
{{--                                <div class="py-2">--}}
{{--                                    <button type="submit" class="btn btn-radical-red rounded-0 px-4">{{__('app.login')}}</button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
        @if (session('no_product_added_to_CARD'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('no_product_added_to_CARD') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('pwd_not_matched'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('pwd_not_matched') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('email_exists'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('email_exists') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('phone_exists'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('phone_exists') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('payment_failed'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('payment_failed') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="mb-4" id="get_back" style="position:relative">

            <div class="py-3">
                <h4 class="text-uppercase">{{__('app.checkout_title')}}</h4>
            </div>

            <form method="POST" action="{{route('placeOrder')}}" id="submit_form">
                @csrf
                <div class="border p-4">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label class="text-bold">{{__('app.first').' '.__('app.name')}}</label>
                            <input type="text" name="first_name" value="{{old('first_name')}}" class="form-control rounded-0" placeholder="{{__('app.first').' '.__('app.name')}}"    required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="text-bold">{{__('app.last').' '.__('app.name')}}</label>
                            <input type="text" name="last_name" value="{{old('last_name')}}"  class="form-control rounded-0" placeholder="{{__('app.last').' '.__('app.name')}}"   required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="text-bold">{{__('app.email').' '.__('app.address')}}</label>
                            <input type="email" name="email"  value="{{old('email')}}"  class="form-control rounded-0" placeholder="{{__('app.email').' '.__('app.address')}}s"   required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="text-bold">{{__('app.phone').' '.__('app.number')}}</label>
                            <input type="number" name="phone" value="{{old('phone')}}"  class="form-control rounded-0" placeholder="{{__('app.phone').' '.__('app.number')}}"    required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="text-bold">{{__('app.password')}}</label>
                            <input type="password" name="password" value="{{old('password')}}"  class="form-control rounded-0" placeholder="{{__('app.password')}}" minlength="8"   required>
                        </div>

                        <div class="col-sm-6 mb-3">
                            <label class="text-bold">{{__('app.confirm').' '.__('app.password')}}</label>
                            <input type="password" name="confirm_password" value="{{old('confirm_password')}}"  class="form-control rounded-0" placeholder="{{__('app.confirm').' '.__('app.password')}}" minlength="8"   required>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label class="text-bold">{{__('app.address')}}</label>
                            <textarea class="form-control rounded-0" name="address"  placeholder="{{__('app.address')}}"   required>{{old('address')}}</textarea>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="text-bold">{{__('app.city')}}</label>
                            <input type="text" name="city" class="form-control rounded-0"  value="{{old('city')}}" placeholder="{{__('app.city')}}"   required>
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label class="text-bold"> {{__('app.postal_code')}}</label>
                            <input type="text" name="postal_code" class="form-control rounded-0"  value="{{old('postal_code')}}" placeholder="{{__('app.postal_code')}}"   required>
                        </div>
                        <div class="col-sm-12 ">
                           <span class="fs-3 text-success me-1 "><i class="fa-solid fa-money-check-dollar"></i></span> <span class="fs-4 text-brand-secondary">{{__('app.select').' '.__('app.payment').' '.__('app.method')}}</span>
                        </div>
                        <hr>

                        <div class="col-sm-6 mb-3">
                            <input type="radio" name="payment" id="cod" value="cod">
                            <label class="text-bold" for="cod"> {{__('app.COD')}}</label>
                            <br>
                            <input type="radio" name="payment" id="paypal"  value="paypal">
                            <label class="text-bold" for="paypal"> {{__('app.paypal')}}</label>

                        </div>
                        <div class="col-sm-6 mb-3">
                        </div>
                    </div>
                    <div class="py-2">
                        <button type="submit" id="submit" class="btn btn-radical-red rounded-0">{{__('app.placeorder')}}</button>
                    </div>
                </div>
            </form>
            <div class="spinner" style="display: none;">
                <div class="loader">
                    <i class="fas fa-spinner fa-spin loading-icon"></i>
                </div>
            </div>

        </div>

    </div>
    @if(Auth::check())
{{--login user logic here--}}
    @else
{{--        no login here--}}
    @endif
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).on('submit','#submit_form',function (){
            $('.spinner').css({
                'display':'block',
            });
        });
    </script>
@endsection
