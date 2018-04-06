<?php $__env->startSection('content'); ?>
    <div>

        <div class="container">
            <div class="row">

                <div class="col-md-4 col-md-offset-4">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Please Sign In</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" method="POST" action="<?php echo e(route('login')); ?>">
                                <?php echo e(csrf_field()); ?>


                                <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">

                                    <div class="col-md-12">
                                        <input class="form-control" placeholder="E-mail" name="email" type="email"
                                               autofocus>

                                        <?php if($errors->has('email')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">

                                    <div class="col-md-12">
                                        <input id="password" type="password" class="form-control" name="password"
                                               placeholder="Password" required>

                                        <?php if($errors->has('password')): ?>
                                            <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                        <?php endif; ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-6">
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox"
                                                       name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>> Remember
                                                Me
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success btn-block btn-lg">
                                            Login
                                        </button>

                                        <a class="btn btn-link"
                                           style="text-align: center; font-size: 11px; display: block; padding-top: 5px;"
                                           href="<?php echo e(route('password.request')); ?>">
                                            Forgot Your Password?
                                        </a>
                                        <a class="btn btn-link"
                                           style="text-align: center; font-size: 11px; display: block; padding-top: 5px;"
                                           href="<?php echo e(url('register')); ?>">
                                            SIGN UP
                                        </a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /#wrapper -->

    
    <input type="hidden" id="admin_url" value="<?php echo e(url('admin')); ?>">
    

    <!-- jQuery -->
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>

    <script src="http://www.jqueryscript.net/demo/jQuery-Plugin-For-Editable-Table-Rows-Table-Edits/build/table-edits.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo e(asset("/bootstrap/js/bootstrap.min.js")); ?>"></script>

    

    <script src="<?php echo e(asset("js/module/admin.js")); ?>" type="text/javascript"></script>

    
    <script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.pts', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>