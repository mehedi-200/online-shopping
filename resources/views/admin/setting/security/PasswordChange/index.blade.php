@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" href="{{asset('admin/privacy/privacy.css')}}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero-section text-white text-center py-3" id=""> <!-- Changed padding to make it thinner -->
        <div class="container">
            <h1 class="display-5 fw-bold">{{__('app.account').' '.__('app.setting')}}</h1>
            <p class="lead">{{__('app.pwd_change_page_title')}}</p>
        </div>
    </section>

    <!-- Account Details Section -->
    <section class="account-section py-5">
        <div class="container">
            <div class="row justify-content-center text-center ">
                <div class="col-md-4 mb-4 d-flex">
                    <div class="feature-box p-4 shadow-sm rounded bg-white flex-fill ">
                        <div class="icon mb-3">
                            <i class="fas fa-envelope fa-3x text-primary"></i>
                        </div>
                        <h5 class="text-black">{{__('app.update').' '.__('app.email')}}</h5>
                        <p class="text-black">{{__('app.pwd_email_title')}}</p>
                        <a href="{{route('security.email')}}" class="btn btn-primary">{{__('app.update').' '.__('app.email')}}</a>
                    </div>
                </div>

                <div class="col-md-4 mb-4 d-flex">
                    <div class="feature-box p-4 shadow-sm rounded bg-white flex-fill ">
                        <div class="icon mb-3">
                            <i class="fas fa-shield-alt fa-3x text-success"></i>
                        </div>
                        <h5 class="text-black">{{__('app.enable').' '.__('2fa')}}</h5>
                        <p id="titleOfEmail" class="size text-black">{{__('app.pwd_2fa_title')}}</p>
                        <a href="#" class="btn btn-success">{{__('app.enable').' '.__('2fa')}}</a>
                    </div>
                </div>

                <div class="col-md-4 mb-4 d-flex">
                    <div class="feature-box p-4 shadow-sm rounded bg-white  flex-fill">
                        <div class="icon mb-3">
                            <i class="fas fa-key fa-3x text-warning"></i>
                        </div>
                        <h5 id="titleOf" class="text-black">{{__('app.change').' '.__('app.password')}}</h5>
                        <p id="titleOfEmail" class="text-black">{{__('app.pwd_change_title')}}</p>
                        <a href="{{route('security.password')}}"  class="btn  btn-warning">{{__('app.change').' '.__('app.password')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

