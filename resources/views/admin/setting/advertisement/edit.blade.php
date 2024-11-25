@extends('layouts.admin')
@section('css')
    <link rel='stylesheet' href="{{asset('admin/slide-property/home.css')}}"/>
@endsection
@section('content')
    <main class="main-content">

        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title"> {{__('app.edit').' '.__('app.here')}} </h6>
            </div>
            <div class="theme-card-body">
                <form action="{{route('advertisement.update',[$add->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="lastName" class="col-lg-4 text-lg-right form-label">{{__('app.advertisement').' '.__('app.name')}}</label>
                        <div class="col-lg-8">
                            <input type="text" value="{{$add->name}}" name="name" placeholder=" {{__('app.name')}}"   class="form-control"  required>
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row " >
                        <label for="lastName"  class="col-lg-4 text-lg-right form-label">{{__('app.advertisement').' '.__('app.image')}}</label>
                        <div class="col-lg-8">
                            <input type="file" name="image"    class="form-control" accept="image/*" >
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="lastName" class="col-lg-4 text-lg-right form-label">{{__('app.upload')}}</label>
                        <div class="col-lg-8">
                            <button class="btn btn-sm py-2 px-4 btn-brand-secondary shadow-sm"   type="submit"  id="upload">{{__('app.upload')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </main>
@endsection


