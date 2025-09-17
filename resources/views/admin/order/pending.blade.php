@extends('layouts.admin')
@section('content')
    <main class="main-content">

        <div class="theme-card">
            <div class="theme-card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table data-table " style="width:100%">
                        <thead class="text-center ">
                        <tr>
                            <th>ID</th>
                            <th>Customer Name</th>
                            <th>Address</th>
                            <th class="text-center">Phone</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Total Price</th>
                            <th class="text-center">Order Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>

                            <tbody>
                           @foreach($orders as $order)
                            <tr class="text-center">
                                <td>{{$order->id}}</td>
                                <td>{{$order->customer->user ? $order->customer->user->name:''}}</td>
                                <td>{{$order->customer->address}}</td>
                                <td>{{$order->customer->user ? $order->customer->user->phone:''}}</td>
                                <td>{{$order->customer->user ? $order->customer->user->email:''}}</td>
                                <td>{{$order->sub_total}}</td>
                                <td>{{$order->created_at->format('d/m/y')}}</td>

                                <td class="text-center">
                                    <a href="{{route('order.view',[$order->id])}}" class="btn btn-success btn-sm">view</a>
                                    <a href="javascript:void(0);"  onclick="deleteItem('{{route('order.delete',[$order->id])}}','pending order')"  class="btn btn-danger btn-sm">Delete</a>
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
