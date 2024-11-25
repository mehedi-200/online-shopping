@extends('layouts.admin')
@section('content')
    <main class="main-content">

        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title">{{__('app.update').' '.__('app.email').' '.__('app.address')}}</h6>
            </div>
            <div class="theme-card-body">
                <form action="{{route('security.updateEmail',[Auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label"></label>
                        <div class="col-lg-8">
                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label"></label>
                        <div class="col-lg-8">
                            @if(session('not-match'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    {{ session('not-match') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.old').' '.__('app.email').' '.__('app.address')}}</label>
                        <div class="col-lg-8">
                            <input type="email" name="old_email" placeholder="{{__('app.email').' '.__('app.address')}}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.new').' '.__('app.email').' '.__('app.address')}}</label>
                        <div class="col-lg-8">
                            <input type="email" name="current_email" placeholder="{{__('app.new').' '.__('app.email').' '.__('app.address')}}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="lastName" class="col-lg-4 text-lg-right form-label"></label>
                        <div class="col-lg-8">
                            <button class="btn btn-sm py-2 px-4 btn-brand-secondary shadow-sm" type="submit">{{__('app.update').' '.__('app.email')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('css')

@endsection
@section('js')

@endsection
