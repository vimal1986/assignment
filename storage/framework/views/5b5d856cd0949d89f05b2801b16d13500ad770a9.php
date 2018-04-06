<?php $__env->startSection('content'); ?>

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
                <a class="navbar-brand" href="<?php echo e(route('admin')); ?>">
                    <img src="<?php echo e(asset('img/pts-admin-logo.gif')); ?>" alt="PTS Logo">
                </a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i
                                class="fa fa-user"></i>
                        &nbsp;Admin<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        
                        
                        
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
                        <a href="<?php echo e(route('admin')); ?>"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#request"><i
                                    class="fa fa-fw fa-gear"></i> Service Request <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="request">
                            <li
                                    <?php if($current_status === 'Open'): ?>
                                    class="active-tab-highlight"
                                    <?php endif; ?>>
                                <a href="<?php echo e(route('admin')); ?>/Open">Open</a>
                            </li>
                            <li
                                    <?php if($current_status === 'In Progress'): ?>
                                    class="active-tab-highlight"
                                    <?php endif; ?>>
                                <a href="<?php echo e(route('admin')); ?>/In Progress">In Progress</a>
                            </li>
                            <li
                                    <?php if($current_status === 'Closed'): ?>
                                    class="active-tab-highlight"
                                    <?php endif; ?>>
                                <a href="<?php echo e(route('admin')); ?>/Closed">Closed</a>
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
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge dash-overall-service-count"><?php echo e($active_count); ?></div>
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
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge dash-open-service-count"><?php echo e($open_count); ?></div>
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
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge dash-in-progress-count"><?php echo e($in_progress_count); ?></div>
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
                                    <div class="col-xs-3">
                                        <i class="fa fa-support fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge dash-closed-service-count"><?php echo e($closed_count); ?></div>
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
                                    <?php $__empty_1 = true; $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li <?php if($loop->first): ?> class="active" <?php endif; ?>>
                                            <a
                                                    href="#<?php echo e(preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($region->name))); ?>"
                                                    class="region-nav-tab-toggle"
                                                    data-toggle="tab">
                                                <?php echo e($region->name); ?>

                                            </a>
                                        </li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <p>No regions Available.</p>
                                    <?php endif; ?>

                                </ul>

                                
                                <input type="hidden" name="_token" id="csrf_token" value="<?php echo e(csrf_token()); ?>">
                                <input type="hidden" value="<?php echo e(json_encode($statuses)); ?>" id="statuses_enum">


                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <?php $__empty_1 = true; $__currentLoopData = $regions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $region): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <div class="tab-pane fade in <?php if($loop->first): ?> active <?php endif; ?>"
                                             id="<?php echo e(preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($region->name))); ?>">

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
                                                
                                                <?php $__empty_2 = true; $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                    <?php if($request->region === $region->id): ?>

                                                        <tr data-id="<?php echo e($request->id); ?>">
                                                            <td style="width:10%;"><span>#<?php echo e($request->id); ?> </span><br>
                                                                <?php if($request->is_emergency): ?>
                                                                    <label for="flag" class="btn-danger"
                                                                           style="font-size: 11px; padding: 3px 5px; font-weight: 400;">Emergency</label>
                                                                <?php endif; ?>
                                                            </td>
                                                            <td style="width:10%;"><?php echo e($request->created_at); ?></td>
                                                            <td style="width:10%;"><?php echo e($request->contact_name); ?></td>
                                                            <td><span><?php echo e($request->email); ?></span><br>
                                                                <span><?php echo e($request->number); ?></span></td>

                                                            <td><?php echo e($request->problem); ?></td>
                                                            <td style="width:20%;">
                                                                <?php echo e($request->description); ?>

                                                            </td>
                                                            <td data-field="status"
                                                                data-status="<?php echo e(preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($request->status))); ?>"
                                                                class="request_status_<?php echo e($request->id); ?>"><?php echo e($request->status); ?></td>
                                                            <td>
                                                                <button id="service_request_<?php echo e($request->id); ?>"

                                                                        class="service-status-edit-save
                                                                    button btn btn-primary button-small
                                                                    edit <?php echo e(preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($request->status))); ?>"

                                                                        data-status="<?php echo e(preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($request->status))); ?>"

                                                                        <?php if(strtolower($request->status) === 'closed'): ?>
                                                                        disabled="disabled"
                                                                        <?php endif; ?>
                                                                >
                                                                    <i class="fa fa-pencil <?php echo e(preg_replace('/[^A-Za-z0-9\-]/', '', strtolower($request->status))); ?>"
                                                                       title="Edit"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        
                                                        
                                                    <?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                    <p>No Requests Available.</p>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <p>No data Available.</p>
                                    <?php endif; ?>
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

    
    <form id="logout-form" action="<?php echo e(url('logout')); ?>" method="POST" style="display: none;">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    </form>

    
    <input type="hidden" id="admin_url" value="<?php echo e(url('admin')); ?>">
    

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script src="<?php echo e(asset("js/module/admin.js")); ?>" type="text/javascript"></script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>