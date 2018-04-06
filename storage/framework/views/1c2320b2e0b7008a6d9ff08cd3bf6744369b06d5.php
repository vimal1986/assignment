<?php $__env->startPush('styles'); ?>
<!-- Bootstrap CSS -->
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"
      integrity="sha256-5ad0JyXou2Iz0pLxE+pMd3k/PliXbkc65CO5mavx8s8=" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap-clockpicker.css')); ?>"/>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="<?php echo e(asset('css/user-list.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div id="page-wrapper" class="list-blade">
        <div class="container-fluid">
            <div class="user-list">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Add Product</h2>

                    </div>
                    <?php if(isset($errors)&&count($errors)>0): ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <!-- <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">x</span>

                                </button>
                                <strong>Error :</strong><?php echo $error; ?>

                            </div> -->

                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>


                    <?php if($is_edit): ?>
                        <?php ($action = url('admin/add-product')); ?>
                        <?php ($method = 'post'); ?>
                    <?php else: ?>
                        <?php ($action = url('admin/add-product')); ?>
                        <?php ($method = 'post'); ?>
                    <?php endif; ?>
                    <div class="panel-body">
                        
                        <form method="<?php echo e($method); ?>" action="<?php echo e($action); ?>" novalidate id="formEvent"
                        enctype="multipart/form-data">
                            <?php echo e(csrf_field()); ?>

                            <?php if($is_edit): ?>
                                <input type="hidden" value="<?php echo e($product->id); ?>" name="product_id">
                            <?php endif; ?>
                        <div class="form-section">
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Product Title<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title"
                                                   name="title"
                                                   value="<?php echo e($product->title?$product->title:Illuminate\Support\Facades\Input::old('title')); ?>"
                                                   placeholder="Enter Product Title" required/>
                                            <?php if($errors->has('title')): ?> <p
                                                    class="help-block"><?php echo e($errors->first('title')); ?></p> <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Year<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title"
                                                   name="year"
                                                   value="<?php echo e($product->year?$product->year:Illuminate\Support\Facades\Input::old('year')); ?>"
                                                   placeholder="Enter Product Title" required/>
                                            <?php if($errors->has('year')): ?> <p
                                                    class="help-block"><?php echo e($errors->first('year')); ?></p> <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        <br>
                        <div class="form-section">
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Make<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title"
                                                   name="make"
                                                   value="<?php echo e($product->make?$product->make:Illuminate\Support\Facades\Input::old('make')); ?>"
                                                   placeholder="make" required/>
                                            <?php if($errors->has('make')): ?> <p
                                                    class="help-block"><?php echo e($errors->first('make')); ?></p> <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">model<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title"
                                                   name="model"
                                                   value="<?php echo e($product->model?$product->model:Illuminate\Support\Facades\Input::old('model')); ?>"                                                  
                                                   placeholder="model" required/>
                                            <?php if($errors->has('model')): ?> <p
                                                    class="help-block"><?php echo e($errors->first('model')); ?></p> <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        <br>

                         <div class="form-section">
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">description<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <textarea class="form-control" id="title"
                                                   name="description">
                                                   <?php echo e($product->description?$product->description:Illuminate\Support\Facades\Input::old('description')); ?>

                                            </textarea>
                                           
                                            <?php if($errors->has('description')): ?> <p
                                                    class="help-block"><?php echo e($errors->first('description')); ?></p> <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">price<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title"
                                                   name="price"
                                                   value="<?php echo e($product->price?$product->price:Illuminate\Support\Facades\Input::old('price')); ?>"
                                                   placeholder="model" required/>
                                            <?php if($errors->has('price')): ?> <p
                                                    class="help-block"><?php echo e($errors->first('price')); ?></p> <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        <br>
                        <br>

                        

                        <div class="form-section">
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">other_information<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title"
                                                   name="other_information"
                                                   value="<?php echo e($product->other_information?$product->other_information:Illuminate\Support\Facades\Input::old('other_information')); ?>"
                                                   placeholder="description" required/>
                                            <?php if($errors->has('other_information')): ?> <p
                                                    class="help-block"><?php echo e($errors->first('other_information')); ?></p> <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Image<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                        
                                            <?php if($product->image_url ?? false): ?>
                                                <img src="<?php echo e(asset($product->image_url ?? "img/noimage.gif")); ?>"
                                                     height="200" width="200" class="img-responsive img-thumbnail"/>
                                            <?php endif; ?>
                                            <input type="file" id="image" name="image" class="form-control"
                                                   placeholder=" Image"
                                                   <?php if(!isset($product->image_url)): ?>
                                                   required
                                                    <?php endif; ?>
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>
                        </div>
                        <br>

                         <div class="form-section">
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Type<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="type"
                                                   name="type">
                                                   <option value="car">Car</option>
                                                   <option value="bike">bike</option>
                                                   <option value="bus">bus</option>
                                                   <option value="bicycle">bicycle</option>
                                            </select>
                                            <!-- <input type="text" class="form-control" id="title"
                                                   name="type" "bike","car","bus","bicycle"
                                                   value="<?php echo e($product->description??''); ?><?php echo e(Illuminate\Support\Facades\Input::old('type')); ?>"
                                                   placeholder="description" required/> -->
                                            <?php if($errors->has('description')): ?> <p
                                                    class="help-block"><?php echo e($errors->first('type')); ?></p> <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>
                        <br>

                            <div class="row">
                                <input type="hidden" value="1" name="action_status">
                                <div class="col-sm-12">
                                    <div class="submit-cancel text-center">
                                        <a href="<?php echo e(url('admin/')); ?>"
                                           class="btn cancel-btn btn-sha mg btnmgr-15">Cancel</a>
                                        <?php if($is_edit): ?>
                                            <input type="submit" id="action_save" class="btn submit-btn btn-sha btnmgr-15"
                                                   value="Update">
                                        <?php else: ?>
                                            <input type="submit" id="action_save" class="btn submit-btn btn-sha btnmgr-15"
                                                   value="Save">
                                        <?php endif; ?>

                                    </div>
                                </div>
                            </div>

                        </form>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('scripts'); ?>
<script src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"
        integrity="sha256-urCxMaTtyuE8UK5XeVYuQbm/MhnXflqZ/B9AOkyTguo=" crossorigin="anonymous"></script>
<script src="<?php echo e(asset('/plugins/ckeditor/ckeditor.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.2/adapters/jquery.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>

        
<script type="text/javascript"
        src="<?php echo e(asset('/plugins/bootstrap-datetimepicker/moment.min.js')); ?>"></script>
<script type="text/javascript"
        src="<?php echo e(asset('/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')); ?>"></script>
<link rel="stylesheet"
      href="<?php echo e(asset('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css')); ?>">
<!-- App scripts -->
<script>
    $(document).ready(function() {
        $('#example').DataTable();
    } );

       $('textarea.foo').ckeditor({
            height: "300px",
            toolbarStartupExpanded: true,
            width: "100%"
        });

//    var jsValidatorRes = new jsValidator().init({
//        form: 'formEvent',
//        forceFilter: true,
//        errorClass: '__error_cap',
//        onChange: true,
//        log: true,
//        message: {
//            required: '<span style="color:#ff5900;">This field is required !</span>',
//            min: '<span style="color:#ff5900;">This field is less then the limit [INDEX]</span>',
//            max: '<span style="color:#ff5900;">This field is exceeds the limit of [INDEX]</span>',
//            password: '<span style="color:#ff5900;">Password doesn\'t match !</span>',
//            email: '<span style="color:#ff5900;">Invalid Email found !</span>'
//        }
//    });


</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.base', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>