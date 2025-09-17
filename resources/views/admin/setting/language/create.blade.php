@extends('layouts.admin')
@section('content')
    <main class="main-content">

        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title">{{__('app.create').' '.__('app.language')}}</h6>
            </div>
            <div class="theme-card-body">
                <form action="{{route('language.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.language').' '.__('app.name')}}</label>
                        <div class="col-lg-8">
                            <input type="text" name="language" placeholder="{{__('app.language').' '.__('name')}}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.iso_code')}}</label>
                        <div class="col-lg-8">
                            <input type="text" name="iso_code" placeholder="{{__('app.iso_code')}}" class="form-control"  required>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.find').' '.__('app.iso_code')}}</label>
                        <div class="col-lg-8">
                            <iframe src="{{asset('admin/Language_iso_code.html')}}" class="form-control" height="300px" >

                            </iframe>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="image" class="col-lg-4 text-lg-right form-label">{{__('app.country_flag')}}</label>
                        <div class="col-lg-8">
                            <input type="file" name="image"  class="form-control"  accept="image/*">
                        </div>
                    </div>

                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="lastName" class="col-lg-4 text-lg-right form-label"></label>
                        <div class="col-lg-8">
                            <button class="btn btn-sm py-2 px-4 btn-brand-secondary shadow-sm" type="submit">{{__('app.submit')}}</button>
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
