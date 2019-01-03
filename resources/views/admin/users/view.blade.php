
@extends('adminlte::page')

@section('title', 'View User')

@section('content_header')
    <h1>View User</h1>
@stop   

@section('content')

    @include('admin.users._change-password')
    @include('admin.users._update')
    @include('admin.users._deactivate')
    @include('admin.users._activate')

    
    <div class="row">
        <div class="col-md-6">
            <div class="form-group pull-right">
                <button type="button" class="btn btn-info btn-sm" id="update-user"><i class="fa fa-edit"></i> Update User</button>
                <button type="button" class="btn btn-success btn-sm" id="change-password"><i class="fa fa-key"></i> Change Password</button>
                @if($user->active)
                    <button class="btn btn-danger btn-sm" type="button" id="deactivate"><i class="fa fa-ban"></i> Deactivate</button>
                @endif
                @if(!$user->active) 
                    <button class="btn btn-primary btn-sm" type="button" id="activate"><i class="fa fa-check"></i> Activate</button>
                @endif
            </div>

            @include('partials.error')

            <table class="table table-bordered">
                <tr>
                    <th>User Name</th>
                    <td>{{$user->username}}</td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>{{$user->full_name}}</td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>{{$user->active?'Active':'Inactive'}}</td>
                </tr>
                <tr>
                    <th>
                        Roles
                    </th>
                    <td>
                        <ul class="list-group">
                        @foreach($user->roles as $role)
                            <li class="list-group-item">
                                {{$role->display_name}}
                                <form action="{{url('/users/remove-role')}}" method="post" class="pull-right">
                                    {{csrf_field()}}
                                    <input type="hidden" name="user_id" value="{{$user->id}}">
                                    <input type="hidden" name="role_id" value="{{$role->id}}">
                                    <button class="btn btn-xs btn-default"><i class="fa fa-remove"></i></button>
                                </form>
                            </li>
                        @endforeach
                        </ul>
                    </td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <h3>Available Roles</h3>
            <ul class="list-group">
                @foreach($available_roles as $role)
                    <li class="list-group-item">
                        <span class="pull-right">
                            <form action="{{url('/users/add-role')}}" method="post">
                                {{csrf_field()}}
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <input type="hidden" name="role_id" value="{{$role->id}}">
                                <button class="btn btn-default btn-xs"><i class="fa fa-plus"></i></button>
                            </form>
                        </span>
                        {{$role->display_name}}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>

@stop

@section('js')
    <script>
    $(document).ready(function(){
        $("#change-password").click(function(){
            $("#passwordModal").modal('show');
        })

        $("#update-user").click(function(){
            $("#updateModal").modal('show');
        })
        
        $("#deactivate").click(function(){
            $("#deactivateModal").modal('show');
        })

        $("#activate").click(function(){
            $("#activateModal").modal('show');
        })
    });
    </script>
@stop