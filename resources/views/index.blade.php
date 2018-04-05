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
                        <a href="javascript:;" data-toggle="collapse" data-target="#request"><i
                                    class="fa fa-fw fa-gear"></i> Service Request <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="request">
                            <li
                                    @if($current_status === 'Open')
                                    class="active-tab-highlight"
                                    @endif>
                                <a href="{{ route('admin') }}/Open">Open</a>
                            </li>
                            <li
                                    @if($current_status === 'In Progress')
                                    class="active-tab-highlight"
                                    @endif>
                                <a href="{{ route('admin') }}/In Progress">In Progress</a>
                            </li>
                            <li
                                    @if($current_status === 'Closed')
                                    class="active-tab-highlight"
                                    @endif>
                                <a href="{{ route('admin') }}/Closed">Closed</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                    <li>
                        <a href="javascript:void(0)"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            <i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                    </li>
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

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <div class="huge dash-overall-service-count">{{ $active_count }}</div>
                                        <div>Overall Services Request</div>
                                    </div>
                                </div>
                            </div>
                            <!-- <a href="#">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a> -->
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <div class="huge dash-open-service-count">{{ $open_count }}</div>
                                        <div>Open Services Request</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <div class="huge dash-in-progress-count">{{ $in_progress_count  }}</div>
                                        <div>In Progress Services Request</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-8 text-right">
                                        <div class="huge dash-closed-service-count">{{ $closed_count }}</div>
                                        <div>Closed Services Request</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <strong>Service Requests</strong>
                            </div>
                            <!-- /.panel-heading -->
                            <div class="panel-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs">
                                    @forelse ($regions as $region)
                                        <li @if ($loop->first) class="active" @endif>
                                            <a
                                                    href="#{{ preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($region->name)) }}"
                                                    class="region-nav-tab-toggle"
                                                    data-toggle="tab">
                                                {{ $region->name }}
                                            </a>
                                        </li>
                                    @empty
                                        <p>No regions Available.</p>
                                    @endforelse

                                </ul>

                                {{-- CSRF token --}}
                                <input type="hidden" name="_token" id="csrf_token" value="{{ csrf_token() }}">
                                <input type="hidden" value="{{ json_encode($statuses) }}" id="statuses_enum">


                                <!-- Tab panes -->
                                <div class="tab-content">
                                    @forelse($regions as $region)
                                        <div class="tab-pane fade in @if ($loop->first) active @endif"
                                             id="{{ preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($region->name)) }}">
                                        <div class="table-scroll">
                                            <table class="u-full-width demo table table-striped
                                            table-bordered table-hover table-condensed">
                                                <thead>
                                                <tr>
                                                    <th>Request Number</th>
                                                    <th>Request Date</th>
                                                    <th>Name</th>
                                                    <th>Contact</th>
                                                    <th>Problem Reported</th>
                                                    <th>Description</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                {{-- TODO : Get Request data based on Tab with Ajax --}}
                                                @forelse($requests as $request)
                                                    @if($request->region === $region->id)

                                                        <tr data-id="{{ $request->id }}">
                                                            <td style="width:10%;"><span>#{{ $request->id }} </span><br>
                                                                @if($request->is_emergency)
                                                                    <label for="flag" class="btn-danger"
                                                                           style="font-size: 11px; padding: 3px 5px; font-weight: 400;">Emergency</label>
                                                                @endif
                                                            </td>
                                                            <td style="width:10%;">{{ $request->created_at}}</td>
                                                            <td style="width:10%;">{{ $request->contact_name }}</td>
                                                            <td><span>{{ $request->email }}</span><br>
                                                                <span>{{ $request->number }}</span></td>

                                                            <td>{{ $request->problem }}</td>
                                                            <td style="width:20%;">
                                                                {{ $request->description }}
                                                            </td>
                                                            <td data-field="status"
                                                                data-status="{{ preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($request->status)) }}"
                                                                class="request_status_{{ $request->id }}">{{ $request->status }}</td>
                                                            <td>
                                                                <button id="service_request_{{ $request->id }}"

                                                                        class="service-status-edit-save
                                                                    button btn btn-primary button-small
                                                                    edit {{ preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($request->status)) }}"

                                                                        data-status="{{ preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($request->status)) }}"

                                                                        @if(strtolower($request->status) === 'closed')
                                                                        disabled="disabled"
                                                                        @endif
                                                                >
                                                                    <i class="fa fa-pencil {{ preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($request->status)) }}"
                                                                       title="Edit"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        {{--@else--}}
                                                        {{--<p>No Requests Available.</p>--}}
                                                    @endif
                                                @empty
                                                    <p>No Requests Available.</p>
                                                @endforelse
                                                </tbody>
                                            </table>
                                            </div>
                                        </div>
                                    @empty
                                        <p>No data Available.</p>
                                    @endforelse
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
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