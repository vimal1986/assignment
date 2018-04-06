<!DOCTYPE html>
<html lang="en">
<?php echo $__env->make('layouts.partials.htmlheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldPushContent('styles'); ?>
<body class="skin-blue sidebar-mini">
<div id="app" v-cloak>
    <div class="wrapper">

    <?php echo $__env->make('layouts.partials.mainheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <?php echo $__env->make('layouts.partials.sidebar', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

        <?php echo $__env->make('layouts.partials.contentheader', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

        <!-- Main content -->
            <section class="content">
                <!-- Your Page Content Here -->
                <?php echo $__env->yieldContent('content'); ?>
            </section><!-- /.content -->
        </div><!-- /.content-wrapper -->


    </div><!-- ./wrapper -->
</div>
<?php echo $__env->make('layouts.partials.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldPushContent('scripts'); ?>
<?php echo $__env->yieldPushContent('map-scripts'); ?>
</body>
</html>