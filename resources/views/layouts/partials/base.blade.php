<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>{{ env('APP_NAME') }} </title>
    <!-- Bootstrap Core CSS -->
    <link href="{{ asset('css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom CSS -->
    {{--<link href="{{ asset('css/styles.css')}}" rel="stylesheet">--}}

    <!-- Morris Charts CSS -->
    {{--<link href="{{ asset('css/plugins/morris.css')}}" rel="stylesheet">--}}

    <!-- Custom Fonts -->
    <link href="{{ asset('font-awesome/css/font-awesome.min.css')}}" rel="stylesheet" type="text/css">

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="{{ asset('img/favicon.ico')}}" type="image/x-icon">

    {{-- Data table css--}}
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">
    @stack('styles')
<body>
<div>
    @yield('content')
</div>
@include('layouts.partials.footer')
</body>
</html>