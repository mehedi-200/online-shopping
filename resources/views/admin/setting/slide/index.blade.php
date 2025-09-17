@extends('layouts.admin')
@section('content')
        <main class="main-content">

            <div class="theme-card">
                <div class="theme-card-header d-flex justify-content-between">
                    <h6 class="theme-card-title">{{__('app.slide').' '.__('app.section')}}</h6>
                    <a href="{{route('slider.create')}}" class="btn btn-success btn-sm">{{__('app.add')}}</a>
                </div>
                <div class="theme-card-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table data-table" style="width:100%">
                            <thead>
                            <tr class="text-center">
                                <th>{{__('app.name')}}</th>
                                <th>{{__('app.discount')}}</th>
                                <th>{{__('app.image')}}</th>


                                <th class="text-center">{{__('app.option')}}</th>
                            </tr>
                            </thead>

                            <tbody>
                            @foreach($slides as $slide)
                                <tr class="text-center">
                                    <td>{{$slide->name}}</td>
                                    <td>{{$slide->discount}} % {{__('app.off')}}</td>

                                    <td>
                                        <img  width='200px' src="{{asset('product/'.$slide->image)}}"/>
                                    </td>

                                    <td class="text-center">
                                        <a href="{{route('slider.show',[$slide->id])}}" class="btn btn-success btn-sm">{{__('app.edit')}}</a>
                                        <a href="javascript:void(0);"  onclick="deleteItem('{{route('slider.destroy',[$slide->id])}}','slider')" class="btn btn-danger btn-sm">{{__('app.delete')}}</a>
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




