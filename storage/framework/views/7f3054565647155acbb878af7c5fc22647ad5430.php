<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vechile Listing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="<?php echo e(asset('css/site.css')); ?>">
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo e(url('site')); ?>">Home</a></li>
        <!-- <li><a href="#">Products</a></li> -->
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li> -->
        <li><a href="<?php echo e(url('login')); ?>"><span class="glyphicon glyphicon-user"></span> Login Seller</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="row">
<div class="col-md-12 text-center">
 <p>Online Vechile Store</p>  
  <form class="form-inline" method="post" action="<?php echo e(url('site')); ?>">
  <?php echo e(csrf_field()); ?>

    Get Model:
  	<select class="form-control" name="model">
    	<!-- <option value="">Select Model type</option>        -->
        <?php if(isset($model)&&count($model)): ?>
          <?php $__currentLoopData = $model; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($val->model); ?>"><?php echo e($val->model); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <option value=""></option>
        <?php endif; ?>
    </select>
    <div class="autocomplete" style="width:300px;">
    	<input class="form-control" id="myInput" type="text" name="type" placeholder="Keyword">
 	 </div>
    <select class="form-control" name="price">
       <?php if(isset($prices)&&count($prices)): ?>
          <?php $__currentLoopData = $prices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $val): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($val->price); ?>"><?php echo e($val->price); ?></option>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php else: ?>
        <option value=""></option>
        <?php endif; ?>
    </select>
    <input type="submit" value="submit" class="btn btn-danger"/>
  </form>
  </div>
</div>
</br>


<?php if(isset($products)&&count($products)): ?>

  <?php for($i=0;$i<count($products);$i=$i+3): ?>
    <div class="container">    
      <div class="row">
      <?php $__currentLoopData = array_slice($products,$i,3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <a href="<?php echo e(url('site/product-detail')); ?><?php echo e('/'.$product['id']); ?>">
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading"><?php echo e($product['title']??''); ?></div>
            <div class="panel-body"><img src="<?php echo e(isset($product['image_path'])?asset($product['image_path']):'https://placehold.it/150x80?text=IMAGE'); ?>" 
              class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer"><?php echo e($product['model']??''); ?></div>
          </div>
        </div> 
       </a> 
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
      </div>
    </div><br>
  <?php endfor; ?>
<?php endif; ?>

<br/>

<footer class="container-fluid text-center footer">
 
</footer>

</body>
<script src="<?php echo e(asset('js/site.js')); ?>"></script>
<script type="text/javascript">

</script>

</html>
