@extends('layouts.admin')


@section('content')
    <div class="card">
        <div class="card-header">
            Select permission for the Role of <b>{{$role->name}}</b>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="offset-3 col-md-6">
                    <form  method="POST" action="{{route('savePermissionForRole', [$role->id])}}" role="form">
                        @csrf
                        @if (session('permission_error'))
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                {{ session('permission_error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Permission</th>
                                <th>
                                    <input id="select_all_input" type="checkbox">
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($permissions as  $permission)
                                <tr>
                                    <td><label for="role{{$permission->id}}"><span class="btn btn-success">{{$permission->display_name}} </span></label></td>
                                    <td><input type="checkbox" class="form-check-input all-checkbox-checked" id="role{{$permission->id}}" name="permission[{{$role->id}}][{{$permission->id}}]" value="1" {!!   (in_array($role->id.'-'.$permission->id, $permissionRole)) ? 'checked' : '' !!} > </td>

                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="card-footer text-end">
                            <button class="btn btn-success">{{__('app.save').' '.__('app.permission')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

@endsection

@section('js')
    <script>
        $(document).on('click','#select_all_input', function(){
            if($(this).prop('checked')){
                $('.all-checkbox-checked').prop('checked',true);

            } else{
                $('.all-checkbox-checked').prop('checked',false);

            }




        });

    </script>
@endsection

