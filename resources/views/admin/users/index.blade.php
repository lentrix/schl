
@extends('adminlte::page')

@section('title', 'User Management')

@section('content_header')
    <h1>User Management</h1>
@stop   

@section('content')

    @include('partials.error')

    <div class="row">
        <div class="col-md-6">
            <div class="page-actions">
                <a href="{{url('/users/create')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Add User</a>
            </div>
        </div>
        <div class="col-md-6">
            <form action="" method="get">
                <div class="input-group">
                    <input type="text" name="search" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>

    @if(count($users)>0)

    <table class="table table-striped">
        <thead>
            <tr>
                <th>User Name</th>
                <th>Full Name</th>
                <th>Since</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr class="clickable" id="{{$user->id}}">
                    <td>{{$user->username}}</td>
                    <td>{{$user->full_name}}</td>
                    <td>{{$user->created_at}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    @endif

@stop

@section('js')
    <script>
        $(document).ready(function(){
            $('.clickable').click(function(evt){
                document.location="{{url('/users')}}/" + evt.currentTarget.id;
            })

            // $('#btn-find-lrn').click(function(){
            //     $('#lrnModal').modal('show');
            // })

            // $('#btn-find-id').click(function(){
            //     $('#idModal').modal('show');
            // })
        });
    </script>
@stop