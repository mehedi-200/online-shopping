@extends('layouts.admin')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/plugin/datatable/css/dataTables.bootstrap5.min.css')}}">

@endsection
@section('content')
    <main class="main-content">

        <div class="theme-card">
            @if (session('role_exists'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('role_exists') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <div class="theme-card-header d-flex justify-content-between" id="role_modal_add_btn">
                <h6 class="theme-card-title">{{__('app.product')}}</h6>
                <a href="#" class="btn btn-success btn-sm" data-bs-target="#role_permission_model" data-bs-toggle="modal" >{{__('app.add')}}</a>
            </div>
            <div class="theme-card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table data-table" style="width:100%">
                        <thead>
                        <tr>
                            <th>{{__('app.name')}}</th>
                            <th class="text-center">{{__('app.option')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($roles as $role)
                                <tr>
                                    <td>{{$role->display_name}}</td>
                                    <td class="text-center">
                                        <a href="{{route('role.set_permission',[$role->id])}}" class="btn btn-success btn-sm">Set Permission</a>
                                        @if($role->is_delete == 'yes')
                                            <a href="javascript:void(0);" onclick="deleteItem('{{route('role.delete',[$role->id])}}','{{__('app.role')}}')"   class="btn btn-danger btn-sm">{{__('app.delete')}}</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade " id="role_permission_model" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-primary" id="myModalLabel">{{__('app.add').' '.__('app.role')}}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{route('role.create')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="custom-form-group custom-form-group-sm mb-3 row">
                                <label for="lastName" class="col-lg-3 text-lg-right form-label text-right">{{__('app.name')}}</label>
                                <div class="col-lg-8 text-center">
                                    <input type="text" placeholder="Role name" name="name" value="{{old('name')}}" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <!-- Modal Footer with Action Buttons -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success" >submit</button>
                        </div>
                    </form>

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
{{--    <script>--}}
{{--        $(document).ready(function (){--}}
{{--            $('#role_modal_add_btn').click();--}}
{{--        });--}}
{{--    </script>--}}
@endsection
