@extends('layouts.admin')
@section('content')
    <main class="main-content">
        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title">{{__('app.product').' '.__('app.sub_category')}}</h6>
                <a href="{{route('sub-category.create')}}" class="btn btn-success btn-sm">{{__('app.add')}}</a>
            </div>
            <div class="theme-card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table data-table" style="width:100%">
                        <thead>
                        <tr>
                            <th>{{__('app.category')}}</th>
                            <th>{{__('app.sub_category')}}</th>
                            <th>{{__('app.product')}}</th>

                            <th>{{__('app.image')}}</th>
                            <th class="text-center">{{__('app.option')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subCategories as $subCategory)

                            <tr>
                                <td>{{$subCategory->category ? $subCategory->category->name : ''}}</td>
                                <td>{{$subCategory->name}}</td>
                                <td>@if($subCategory->product)
                                        @foreach($subCategory->product as $pd)
                                            {{$pd->name}}
                                        @endforeach
                                @endif</td>
                                <td class="text-center"><img width='50px'  src="{{asset('product/'.$subCategory->image)}}" alt=""></td>
                                <td class="text-center">
                                    <a href="{{route('sub-category.show',[$subCategory->id])}}" class="btn btn-success btn-sm">{{__('app.edit')}}</a>
                                    <a href="javascript:void(0);"  onclick="deleteItem('{{route('sub-category.destroy',[$subCategory->id])}}','sub-category')" class="btn btn-danger btn-sm">{{__('app.delete')}}</a>
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
            $('#dataTable').DataTable();
        });
    </script>
@endsection
