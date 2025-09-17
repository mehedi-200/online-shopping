@extends('layouts.admin')
@section('content')
    <main class="main-content">
        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title">{{__('app.product').' '.__('app.category')}} </h6>
                <a href="{{route('category.create')}}" class="btn btn-success btn-sm">{{__('app.add')}}</a>
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
                            <th class="text-center">{{__('app.display')}} [ <span class="text-success fw-bold">{{$display->count()}}</span> out of 5] </th>
                            <th class="text-center">{{__('app.option')}}</th>
                        </tr>
                        </thead>
                        <tbody>

                           @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>
                                <td>
                                    @if($category->subCategory)
                                        @foreach($category->subCategory as $subCat)
                                            {{$subCat->name}}
                                        @endforeach
                                    @endif
                                </td>
                                <td>
                                    @if($category->product)
                                        @foreach($category->product as $pd)
                                            {{$pd->name}}
                                        @endforeach
                                    @endif
                                </td>

                                <td class="text-center"><img width='60px' height="40px" src="{{asset('product/'.$category->image)}}" alt=""></td>
                                <td class="text-center">
                                @if($category->display ==='yes')
                                        <button class="btn-success btn btn-sm">
                                            {{$category->display}}
                                        </button>
                                @endif
                                </td>
                                <td class="text-center">
                                    <a href="{{route('category.edit',[$category->id])}}" class="btn btn-success btn-sm">{{__('app.edit')}}</a>
                                    <a href="javascript:void(0);" onclick="deleteItem('{{route('category.delete',[$category->id])}}','Category')"  class="btn btn-danger btn-sm">{{__('app.delete')}}</a>

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
