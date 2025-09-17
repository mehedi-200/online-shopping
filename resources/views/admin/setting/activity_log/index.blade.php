@extends('layouts.admin')
@section('content')
        <main class="main-content">

            <div class="theme-card">
                <div class="theme-card-header d-flex justify-content-between">
                    <h6 class="theme-card-title">{{__('app.user').' '.__('app.activity')}}</h6>
                </div>
                <div class="theme-card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table data-table" style="width:100%">
                            <thead>
                            <tr class="">
                                <th>{{__('app.user').' '.__('app.name')}}</th>
                                <th>{{__('app.email').' '.__('app.address')}} </th>
                                <th class="text-center">{{__('app.option')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($user as $active)
                                <tr class="">
                                    <td>{{$active->name}}</td>
                                    <td>{{$active->email}}</td>
                                    <td class="text-center">
                                        <a href="{{route('activity.view',[$active->id])}}" class="btn btn-success btn-sm">{{__('app.view')}}</a>
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
    <!--============== Extra Plugin ===================-->
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


