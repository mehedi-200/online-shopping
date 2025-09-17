@extends('layouts.admin')
@section('css')
    <style>
        .form-label {
            font-weight: 600;
        }
        .form-container {
            background: white;
            padding: 10px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        .lang-header {
            font-weight: bold;
            font-size: 20px;
            margin-bottom: 20px;
        }
    </style>
@endsection
@section('content')
    <div class="main-content">
        <form class="form-container" action="{{route('language.translated',[$language->id])}}" method="post" >
            @csrf
            <div class="lang-header">Translate Your Language ( English => {{$language->language}} )</div>

            <div class="row g-3">
                @foreach($language_array as $key => $lang)
                    <div class="col-md-6 col-12">
                        <label class="form-label col-md-4">{{$key}} =></label>
                        <input type="text" name="{{$key}}" class="form-control col-md-8" value="{{$lang}}">
                    </div>
                @endforeach
                    <div class="col-md-12 col-12">
                        <input type="submit" class="btn btn-success float-right">
                    </div>
            </div>
        </form>
    </div>

@endsection
