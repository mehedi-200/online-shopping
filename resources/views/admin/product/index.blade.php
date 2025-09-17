@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugin/datatable/css/dataTables.bootstrap5.min.css')}}">

@endsection
@section('content')
    <main class="main-content">

        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title">{{__('app.product')}}</h6>
                <a href="{{route('product.csvDownload')}}" class="btn btn-secondary btn-sm">CSV</a>
                <a href="{{route('product.create')}}" class="btn btn-success btn-sm">{{__('app.add')}}</a>
            </div>
            <div class="theme-card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table data-table" style="width:100%">
                        <thead>
                        <tr>
                            <th>{{__('app.category')}}</th>
                            <th>{{__('app.sub_category')}}</th>
                            <th>{{__('app.product')}}</th>
                            <th>{{__('app.title')}}</th>
                            <th>{{__('app.price')}}</th>
                            <th>{{__('app.image')}}</th>
                            <th class="text-center">{{__('app.option')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$product->category ? $product->category->name:''}}</td>
                                <td>{{$product->subCategory ? $product->subCategory->name:''}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->title}}</td>
                                <td>{{$product->price}}</td>
                                <td class="text-center"><img width='50px'  src="{{asset('product/'.$product->image)}}" alt=""></td>
                                <td class="text-center">
                                    <a href="{{route('product.edit',[$product->id])}}" class="btn btn-success btn-sm">{{__('app.edit')}}</a>
                                    <a href="javascript:void(0);" onclick="deleteItem('{{route('product.delete',[$product->id])}}','product')"  class="btn btn-danger btn-sm">{{__('app.delete')}}</a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                {{$products->links()}}
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
