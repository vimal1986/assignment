<!DOCTYPE html>
<html lang="en">
  <head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>eCommerce Product Detail</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
    <link href="<?php echo e(asset('css/product-detail.css')); ?>" rel="stylesheet">

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

	
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src="<?php echo e(asset($productDetail->image_path)); ?>" /></div>
						  <!-- <div class="tab-pane" id="pic-2"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-3"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-4"><img src="http://placekitten.com/400/252" /></div>
						  <div class="tab-pane" id="pic-5"><img src="http://placekitten.com/400/252" /></div> -->
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="<?php echo e(asset($productDetail->image_path)); ?>" /></a></li>
						  <!-- <li><a data-target="#pic-2" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-4" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li>
						  <li><a data-target="#pic-5" data-toggle="tab"><img src="http://placekitten.com/200/126" /></a></li> -->
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title"><?php echo e($productDetail->title??''); ?></h3>
				
						<p class="product-description">
                <?php echo e($productDetail->description??''); ?>

            </p>
						<h4 class="price">current price: <span><?php echo e($productDetail->price??''); ?></span></h4>
            <h4 class="price">Model: <span><?php echo e($productDetail->model??''); ?></span></h4>
            <h4 class="price">Make: <span><?php echo e($productDetail->make??''); ?></span></h4>
            <p class="product-description">
                <?php echo e($productDetail->other_information??''); ?>

            </p>
					
					</div>

          <div class="details col-md-6">
						<h3 class="product-title"><?php echo e($productDetail->user->first_name??''); ?> <?php echo e($productDetail->user->last_name??''); ?></h3>
				
						<!-- <p class="product-description">
                <?php echo e($productDetail->description??''); ?>

            </p> -->
						<h4 class="price">Moblie No: <span><?php echo e($productDetail->user->mobile??''); ?></span></h4>
           
            Address:<p class="product-description">
                 <?php echo e($productDetail->user->address??''); ?>

            </p>
					
					</div>
				</div>
			</div>
		</div>
	</div>
    <br>
    <footer class="container-fluid text-center footer">
  <p>Online Store Copyright</p>  
  
</footer>
  </body>
</html>
