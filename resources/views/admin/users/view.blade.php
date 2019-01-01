
@extends('adminlte::page')

@section('title', 'View User')

@section('content_header')
    <h1>View User</h1>
@stop   

@section('content')

    <!-- Modal Change Password -->
    <div id="passwordModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-key"></i> Change Password for User {{$user->username}}</h4>
                </div>
                <form action='{{url("/users/$user->id/change-password")}}' method="post">
                    {{csrf_field()}}
                    <div class="modal-body">
                    
                        <div class='form-group'>
                            <label for='password'>Password</label>
                            <input type='password' name='password' class='form-control' />
                        </div>
                        <div class='form-group'>
                            <label for='password_confirmation'>Password Confirmation</label>
                            <input type='password' name='password_confirmation' class='form-control' />
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-key"></i> Change Password</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    <!-- Modal Update User -->
    <div id="updateModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-edit"></i> Update User {{$user->username}}</h4>
                </div>
                {!! Form::model($user,['url'=>"/users/$user->id", 'method'=>'patch'])  !!}
                    {{csrf_field()}}
                    {{method_field('patch')}}
                    <div class="modal-body">
                    
                        <div class='form-group'>
                            <?= Form::label('username', 'User Name'); ?>
                            <?= Form::text('username',null,['class'=>'form-control']); ?>
                        </div>

                        <div class='form-group'>
                            <?= Form::label('full_name', 'Full Name'); ?>
                            <?= Form::text('full_name', null, ['class' => 'form-control']); ?>
                        </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Update User</button>
                    </div>

                {!! Form::close() !!}
            </div>
        </div>
    </div>

    <!-- Modal Deactivate -->
    <div id="deactivateModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-ban"></i> Deactivate {{$user->username}}</h4>
                </div>
                <form method="post" action='{{url("/users/$user->id/set-active")}}'>
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="active" value="0">
                        Are you sure you want to deactivate {{$user->full_name}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> No - Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Yes - Deactivate User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Activate -->
    <div id="activateModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="fa fa-check"></i> Activate {{$user->username}}</h4>
                </div>
                <form method="post" action='{{url("/users/$user->id/set-active")}}'>
                    {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="active" value="1">
                        Are you sure you want to activate {{$user->full_name}}?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-close"></i> No - Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-edit"></i> Yes - Activate User</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    
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
                    <th>Department</th>
                    <td>{{$user->dept}}</td>
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