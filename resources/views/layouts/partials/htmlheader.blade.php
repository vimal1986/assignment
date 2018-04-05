<head>
    <meta charset="UTF-8">
    <title>{{ env('APP_NAME') }} </title>
    {{--<title>{{ config('app.name', 'PTS Connect') }}</title>--}}
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet" type="text/css" />
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/common.css') }}" rel="stylesheet" type="text/css" />
    <link rel="icon" href="{{ asset('img/favicon.ico') }}" type="image/x-icon" />
    <link rel="stylesheet" media="all" href="{{ asset('css/jquery-jvectormap.css') }}"/>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <![endif]-->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

</head>
