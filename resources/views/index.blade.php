@extends('layouts.base')

@section('content')

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{ route('admin') }}">
                    <img src="{{ asset('img/pts-admin-logo.gif')}}" alt="PTS Logo">
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="fa fa-user"></i>
                        &nbsp;Admin<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        {{--<li>--}}
                        {{--<a href="javascript:void(0)"><i class="fa fa-fw fa-user"></i> Change Password</a>--}}
                        {{--</li>--}}
                        <li>
                            <a href="javascript:void(0)"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="{{ route('admin') }}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                       
                    
                    <li>
                  
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading Not Required for dashboard, if you need uncomment it-->
                <!-- <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div> -->
                <!-- /.row -->

                <div>&nbsp;</div>

               
                <!-- /.row -->

                <div class="row">
                   
                </div>
                <!-- /.row -->


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    {{--Logout--}}
    <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>

    {{-- URl --}}
    <input type="hidden" id="admin_url" value="{{ url('admin') }}">
    {{----}}

@endsection

@section('script')

    <script src="{{ asset("js/module/admin.js") }}" type="text/javascript"></script>

@endsection