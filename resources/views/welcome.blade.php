<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>MDC School Management System</title>

        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <p style="margin-top: 20px; text-align: center">
                        <img src="{{asset('images/logo.png')}}" alt="MDC Logo">
                    </p>
                    @include('partials.error')
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <span class="large-text">User Login</span>
                        </div>
                        <div class="panel-body">
                            <form action="{{url('/login')}}" method="post">
                                {{csrf_field()}}
                                <div class='form-group'>
                                    <label for='username'>User Name</label>
                                    <input type='text' name='username' class='form-control' />
                                </div>
                                <div class='form-group'>
                                    <label for='password'>Password</label>
                                    <input type='password' name='password' class='form-control' />
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary pull-right">
                                        <i class="glyphicon glyphicon-log-in"></i> Login
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <p style="text-align: center; color: #777;">
                        MDC School Management System
                    </p>
                </div> 
                
            </div>
        </div>
    </body>
</html>
