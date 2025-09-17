@extends('layouts.admin')
@section('content')
    <main class="main-content">
            <div class="theme-card">
                <div class="theme-card-header d-flex justify-content-between">
                    <h6 class="theme-card-title">Create User Account</h6>
                </div>
                <div class="theme-card-body">
                    @if (session('not-match'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('not-match') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    <form action="{{route('user.password_updated',[auth()->user()->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="custom-form-group custom-form-group-sm mb-3 row">
                            <label for="email" class="col-lg-4 text-lg-right form-label">New Password</label>
                            <div class="col-lg-8">
                                <input type="text" name="NewPassword" value="{{old('NewPassword')}}" placeholder="New Password" class="form-control"  required>
                            </div>
                        </div>
                        <div class="custom-form-group custom-form-group-sm mb-3 row">
                            <label for="password" class="col-lg-4 text-lg-right form-label">Confirm Password</label>
                            <div class="col-lg-8">
                                <input type="text" name="ConfirmPassword" value="{{old('ConfirmPassword')}}" placeholder="Confirm Password" class="form-control"  required>
                            </div>
                        </div>

                        <div class="custom-form-group custom-form-group-sm mb-3 row">
                            <label for="lastName" class="col-lg-4 text-lg-right form-label"></label>
                            <div class="col-lg-8">
                                <button class="btn btn-sm py-2 px-4 btn-brand-secondary shadow-sm" type="submit">Submit</button>
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
