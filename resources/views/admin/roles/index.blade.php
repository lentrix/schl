
@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Roles</h1>
@stop   

@section('content')
    
    <div class="row">
        <div class="col-md-7">
            <table class="table striped">
                <thead>
                    <tr>
                        <th>Role Name</th>
                        <th>Display Name</th>
                        <th>Description</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)

                        <tr>
                            <td>{{$role->name}}</td>
                            <td>{{$role->display_name}}</td>
                            <td>{{$role->description}}</td>
                            <td>
                                <form action='{{url("/roles/destroy")}}' method="post">
                                    {{csrf_field()}}
                                    <input type="hidden" name="id" value="{{$role->id}}">
                                    <button class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></button>
                                </form>
                            </td>
                        </tr>

                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="col-md-5">
            <h3>Add a Role</h3>
            @include('partials.error')
            <form action="{{url('/roles')}}" method="post">
                {{csrf_field()}}
                <div class='form-group'>
                    <label for='name'>Role Name</label>
                    <input type='text' name='name' class='form-control' />
                </div>
                <div class='form-group'>
                    <label for='display_name'>Display Name</label>
                    <input type='text' name='display_name' class='form-control' />
                </div>
                <div class='form-group'>
                    <label for='description'>Description</label>
                    <input type='text' name='description' class='form-control' />
                </div>
                <div class='form-group'>
                    <button type='submit' class='btn btn-primary'>Add Role</button>
                </div>
            </form>
        </div>
    </div>

@stop

@section('css')
    
@stop

@section('js')
    
@stop