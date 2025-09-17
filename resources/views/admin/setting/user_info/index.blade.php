@extends('layouts.admin')
@section('content')
    <main class="main-content">

        <div class="theme-card">
            <div class="theme-card-header d-flex justify-content-between">
                <h6 class="theme-card-title">User Information</h6>
                <a href="{{route('user.create')}}" class="btn btn-success btn-sm">Add</a>
            </div>
            <div class="theme-card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table data-table " style="width:100%">
                        <thead class="text-center ">
                        <tr>
                            <th>ID</th>
                            <th>image</th>
                            <th>Name</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Login Date</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $key => $user)
                            <tr class="text-center">
                                <td>{{$user->id}}</td>
                                <td>
                                    <img src="{{file_exists(public_path('profile/'.$user->image)) && $user->image ? asset('profile/'.$user->image) : asset('admin/images/avatar/user-avatar.png')}}" alt="" width="50px">
                                </td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->created_at->format('d/m/y')}}</td>
                                <td class="text-center">
                                    <a href="{{route('user.edit',[$user->id])}}"  class="btn btn-success btn-sm">Edit</a>

                                @if($key !== 0)
                                        <a href="javascript:void(0);" onclick="deleteItem('{{route('user.delete',[$user->id])}}','user account')" class="btn btn-danger btn-sm">Delete</a>
                                    @endif

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
