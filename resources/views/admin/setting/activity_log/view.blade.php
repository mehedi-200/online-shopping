@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugin/datatable/css/dataTables.bootstrap5.min.css')}}">

@endsection

@section('content')
    <main class="main-content">

        <div class="col-lg-12 mb-3">
            <div class="card bg-success text-white">
                <div class="card-header">
                    <h5 class="card-title text-center  ">{{__('app.user_active_log_view_page_title')}} <strong>{{$users->name}}</strong></h5>
                </div>
            </div>
        </div>
        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title"></h6>
                <div class="card-info">
                </div>
            </div>
            <div class="theme-card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table data-table restore-shorting " style="width:100%">
                        <thead>
                        <tr>
                            <th>{{__('app.date')}}</th>
                            <th>{{__("app.time")}}</th>
                            <th>{{__("app.details")}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($activity as $active)
                        <tr>
                            <td>{{$active->created_at->format('d/m/y')}}</td>
                            <td>{{$active->created_at->format('h:i:s')}}</td>
                            <td>{{$active->description}}</td>

                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </main>





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
