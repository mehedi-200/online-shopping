@extends('layouts.admin')
@section('css')

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('admin/privacy/lock.css')}}">

@endsection

@section('content')
    <div class="card">
        <div class="icon-container">
            <i class="fas fa-lock"></i>
        </div>
        <h3 class="card-title">{{__('app.change').' '.__('app.your').' '.__('app.password')}}</h3>
        <form id="changePasswordForm" action="{{route('security.change_password',[Auth()->user()->id])}}"  method="POST">
            @csrf
            <div class="mb-3">
                <label for="currentPassword" class="form-label">{{__('app.current').' '.__('app.password')}} </label>
                <input type="password" class="form-control" id="currentPassword" minlength="8" placeholder="{{__('app.enter').' '.__('app.current').' '.__('app.password')}}" required>
            </div>
            <div class="mb-3">
                <label for="newPassword" class="form-label">{{__('app.new').' '.__('app.password')}} </label>
                <input type="password" name="newPassword" class="form-control" id="newPassword" placeholder="{{__('app.enter').' '.__('app.new').' '.__('app.password')}}" minlength="8"  required>
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label">{{__('app.confirm').' '.__('app.password')}} d</label>
                <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="{{__('app.enter').' '.__('app.confirm').' '.__('app.password')}}" minlength="8" required>
            </div>
            @if (session('error'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <button type="submit" class="btn btn-primary">{{__('app.update').' '.__('app.password')}}</button>
        </form>
    </div>
@endsection



