@extends('layouts.admin')
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
@endsection

@section('content')
    <div id="app">
        <router-view v-slot="{Component}" >
            <Component :is="Component" :logo-url="{{ json_encode(asset('profile/img.png')) }}"
                       :user-details="{{ json_encode(Auth()->user()) }}">

            </Component>
        </router-view>
    </div>

@endsection


@section('js')
    @vite(['resources/js/app.js'])

@endsection
