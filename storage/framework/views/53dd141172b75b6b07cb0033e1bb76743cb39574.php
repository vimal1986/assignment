<?php $__env->startPush('styles'); ?>
<!-- Bootstrap CSS -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo e(asset('css/user-list.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <?php if(isset($view)): ?>
       
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2>Product Info</h2>
            </div>

            <div class="panel-body">
                <section class="profile">
                    <div class="row">
                        <div class="col-md-3">
                            <dl class="profile-img">
                                <div class="middle">
                                    <?php if(isset($productDetail->image_path)): ?>
                                        <img  height="50" width="50" src="<?php echo e(asset($productDetail->image_path)); ?>" alt="Product image" />
                                    <?php else: ?>
                                        <img  src="<?php echo e(asset('image/user_image.png')); ?>" alt="Product image"/>
                                    <?php endif; ?>
                                </div>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="email">Product Title:</label>
                                    <div class="col-sm-8">
                                        <?php echo e(isset($productDetail->title)?$productDetail->title:''); ?>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    <?php endif; ?>
    <div id="page-wrapper" class="list-blade">
        <div class="container-fluid">
            <div class="user-list">
                <?php if(Session::has('messages')): ?>
                    <div class="alert alert-success hide-alert-message">
                        <?php echo e(Session::get('messages')); ?>

                    </div>
                    <?php (Session::remove('success')); ?>
                <?php endif; ?>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                           <div class="col-sm-2 col-md-3">
                               <h2>Product List</h2>
                           </div>
                            <div class="col-sm-10 col-md-9 text-right">
                                <a class="btn btn-primary" href="<?php echo e(url('admin/add-product')); ?>">Add Product</a>
                            </div>
                        </div>

                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example">
                                <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Year</th>
                                    <th>Make</th>
                                    <th>Model</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                    <th>Image</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                
                                <?php if(isset($product)&&count($product)): ?>
                                    <?php ($i=1); ?>
                                    <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($i++); ?></td>
                                            <td><?php echo e($list->title); ?></td>
                                            <td><?php echo e($list->year); ?></td>
                                            <td><?php echo e($list->make); ?></td>
                                            <td><?php echo e($list->model); ?></td>
                                            <td><?php echo e($list->price); ?></td>
                                            <td><?php echo e($list->type); ?></td>
                                            <td>
                                            <!-- <?php echo e(dump($list->image_url)); ?> -->
                                            <?php if(isset($list->image_path)): ?>
                                                <img src="<?php echo e(asset($list->image_path ?? "img/noimage.gif")); ?>"
                                                     height="50" width="50" class="img-responsive img-thumbnail"/>
                                            <?php endif; ?>
                                            </td>
                                            <td>
                                                <a href="<?php echo e(url('admin/view-product/' . $list->id)); ?>" >
                                                    <i class="fa fa-file" aria-hidden="true"></i>
                                                </a>
                                                 <a href="<?php echo e(url('admin/edit-product/' . $list->id)); ?>" >
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a class="product_delete" href="<?php echo e(url('admin/delete-product/' . $list->id)); ?>" >
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php else: ?>
                                    <tr><td colspan="8">No Record Found</td></tr>
                                <?php endif; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
<!-- App scripts -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

     $(document).on('click', '.product_delete', function (e) {
        var confirm_delete = confirm('Are you sure to Remove ?');
        if (!confirm_delete) {
            e.preventDefault();
        }
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>