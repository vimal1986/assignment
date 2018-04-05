<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>PTS Admin Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('css/styles.css')}}" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="{{ asset('css/plugins/morris.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.png')}}" type="image/x-icon">

    {{-- Data table css--}}
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4" style="text-align: center; margin-bottom: 20px;">
                <img src="img/pts-login-logo.png" alt="PTS Logo">
            </div>

            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="E-mail" name="email" type="email"
                                           autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password"
                                           value="">
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
                                    </label>
                                </div>
                                <!-- Change this to a button or input when using this as a form -->
                                <a href="index.php" class="btn btn-lg btn-success btn-block">Login</a>
                                <a href="#" class="frgt_pswrd"
                                   style="text-align: center; font-size: 11px; display: block; padding-top: 5px;">Forgot
                                    Password?</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /#wrapper -->

{{-- URl --}}
<input type="hidden" id="admin_url" value="{{ url('admin') }}">
{{----}}

<!-- jQuery -->
<script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

<script src="http://www.jqueryscript.net/demo/jQuery-Plugin-For-Editable-Table-Rows-Table-Edits/build/table-edits.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="{{ asset("/bootstrap/js/bootstrap.min.js") }}"></script>

{{--<script src="{{ asset("js/custom.js") }}"></script>--}}

<script src="{{ asset("js/module/admin.js") }}" type="text/javascript"></script>

{{-- Data Table JS --}}
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" type="text/javascript"></script>

</body>

</html>
