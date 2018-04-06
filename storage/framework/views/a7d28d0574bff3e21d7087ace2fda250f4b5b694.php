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
    <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo e(asset('css/styles.css')); ?>" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo e(asset('css/plugins/morris.css')); ?>" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo e(asset('font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

    <!-- Fav Icon -->
    <link rel="shortcut icon" href="<?php echo e(asset('img/favicon.png')); ?>" type="image/x-icon">

    
    <link href="https://cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="text-align: center; margin-bottom: 20px;">
            <img src="<?php echo e(asset('img/pts-login-logo.png')); ?>" alt="PTS Logo">
        </div>
    </div>
</div>
<div>
    <?php echo $__env->yieldContent('content'); ?>
</div>

<!-- Scripts -->
<script src="<?php echo e(asset('js/app.js')); ?>"></script>
</body>
</html>