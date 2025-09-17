@extends('layouts.admin')
@section('content')
    <main class="main-content">
        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title">{{__('app.language')}} </h6>
                <a href="{{route('language.create')}}" class="btn btn-success btn-sm">{{__('app.add')}}</a>
            </div>
            <div class="theme-card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table data-table" style="width:100%">
                        <thead>
                        <tr>
                            <th class="text-center">{{__('app.flag')}}</th>
                            <th class="text-center">{{__('app.language')}}</th>
                            <th class="text-center">{{__('app.iso_code')}}</th>
                            <th class="text-center">{{__('app.content')}}</th>
                            <th class="text-center">{{__('app.option')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($languages as $language)
                            <tr>
                                <td class="text-center"><img src="{{asset('language/'.$language->image)}}" width="40px" alt=""></td>
                                <td class="text-center">{{ucfirst($language->language)}}</td>
                                <td class="text-center">{{strtoupper($language->iso_code)}}</td>
                                <td class="text-center"><a href="{{route('language.translate',[$language->id])}}" class="btn btn-secondary btn-sm text-center"><i class="fa-solid fa-globe me-2"></i>{{__('app.translate')}}</a></td>
                                <td class="text-center">
                                    <a href="{{route('language.edit',[$language->id])}}" class="btn btn-success btn-sm">{{__('app.edit')}}</a>
                                    <a href="javascript:void(0);" onclick="deleteItem('{{route('language.delete',$language->id)}}','Language')"  class="btn btn-danger btn-sm">{{__('app.delete')}}</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugin/datatable/css/dataTables.bootstrap5.min.css')}}">

@endsection






@section('js')
    <script type="text/javascript" src="{{asset('admin/plugin/nicescroll/jquery.nicescroll.js')}}"></script>
{{--    <!--============== Extra Plugin ===================-->--}}
    <script type="text/javascript" src="{{asset('admin/plugin/datatable/js/jquery.dataTables.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/plugin/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                'order':[[0,'desc']]
            });
        });
    </script>
@endsection
