@extends('adminlte::master')

@section('body')

<div class="container">
    
    <div class="col-md-4 col-md-offset-4" style="margin-top: 50px">
        
        @include('partials.error')
        
        <div class="panel panel-primary">
            <div class="panel-heading">
                <img src="{{asset('images/logo.png')}}" 
                        alt="MDC Logo" style="height: 50px">
                <span class="large-text">User Login</span>
            </div>

            <div class="panel-body">
                <form action="{{url('/login')}}" method="post">
                    {{csrf_field()}}
                    <div class='form-group'>
                        <label for='username'>User Name</label>
                        <input type='text' name='username' class='form-control' value="{{old('username')}}" />
                    </div>
                    <div class='form-group'>
                        <label for='password'>Password</label>
                        <input type='password' name='password' class='form-control' />
                    </div>
                    <div class='form-group'>
                        <button type='submit' class='btn btn-primary pull-right'>
                            <i class="fa fa-user"></i> Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>

@stop()