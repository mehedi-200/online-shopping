@extends('layouts.admin')
@section('content')
    <main class="main-content">

        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title">{{__('app.update').' '.__('app.email').' '.__('app.address')}}</h6>
            </div>
            <div class="theme-card-body">
                <form action="{{route(session('url') === 1 ?'security.updateEmail':'security.changeEmail',[Auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
{{--                <form action="{{route('security.send-email')}}" method="POST" enctype="multipart/form-data">--}}
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
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="name" class="col-lg-4 text-lg-right form-label">{{ session('new_email') ? session('new_email'):  __('app.old').' '.__('app.email').' '.__('app.address')}}</label>
                        <div class="col-lg-8">
                            <input type="email" name="{{session('url')  === 1  ? 'current_email' :'old_email' }}" placeholder="{{__('app.email').' '.__('app.address')}}" class="form-control"  required>
                        </div>
                    </div>
{{--                    <div class="custom-form-group custom-form-group-sm mb-3 row">--}}
{{--                        <label for="name" class="col-lg-4 text-lg-right form-label">{{__('app.new').' '.__('app.email').' '.__('app.address')}}</label>--}}
{{--                        <div class="col-lg-8">--}}
{{--                            <input type="email" name="current_email" placeholder="{{__('app.new').' '.__('app.email').' '.__('app.address')}}" class="form-control"  required>--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="custom-form-group custom-form-group-sm mb-3 row">
                        <label for="lastName" class="col-lg-4 text-lg-right form-label"></label>
                        <div class="col-lg-8">
                            <button class="btn btn-sm py-2 px-4 btn-brand-secondary shadow-sm" type="submit">{{__('app.update').' '.__('app.email')}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
 <button data-bs-target="#inputModal" data-bs-toggle="modal" class="d-none modal-button">on</button>
        <!-- Modal -->
        <div class="modal fade " id="inputModal" tabindex="-1" aria-labelledby="inputModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h5 class="modal-title" id="">Input Form</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- Modal Body -->
                    <div class="modal-body">
                        <form method="POST" action="{{route('security.verifyEmail',[Auth()->user()->id])}}">
                            @csrf
                            <div class="mb-3">
                                <label for="userInput" class="form-label w-100 fs-5 {{session('error_verify') ? 'bg-danger text-white p-1  text-center':''}}">{{ session('success')}}{{session('error_verify')}}</label>
                                <input type="number" min="6"  class="form-control" name="verify_code" placeholder="Enter code here" required>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit"  class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- Modal Footer -->

                </div>
            </div>
        </div>



    </main>
@endsection
@section('css')

@endsection
@section('js')
    @if(session('model') === 1)
        <script>
            $(document).ready(function (){
                let obj = $('.modal-button');
                obj.click();
            })
        </script>
    @endif


@endsection
