<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vechile Listing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="{{asset('css/site.css')}}">
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
        <li class="active"><a href="{{url('site')}}">Home</a></li>
        <!-- <li><a href="#">Products</a></li> -->
        
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Your Account</a></li> -->
        <li><a href="{{url('login')}}"><span class="glyphicon glyphicon-user"></span> Login Seller</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="row">
<div class="col-md-12 text-center">
 <p>Online Vechile Store</p>  
  <form class="form-inline" method="post" action="{{url('site')}}">
  {{csrf_field()}}
    Get Model:
  	<select class="form-control" name="model">
    	<!-- <option value="">Select Model type</option>        -->
        @if(isset($model)&&count($model))
          @foreach($model as $val )
            <option value="{{$val->model}}">{{$val->model}}</option>
          @endforeach
        @else
        <option value=""></option>
        @endif
    </select>
    <div class="autocomplete" style="width:300px;">
    	<input class="form-control" id="myInput" type="text" name="type" placeholder="Keyword">
 	 </div>
    <select class="form-control" name="price">
       @if(isset($prices)&&count($prices))
          @foreach($prices as $val )
            <option value="{{$val->price}}">{{$val->price}}</option>
          @endforeach
        @else
        <option value=""></option>
        @endif
    </select>
    <input type="submit" value="submit" class="btn btn-danger"/>
  </form>
  </div>
</div>
</br>


@if(isset($products)&&count($products))

  @for($i=0;$i<count($products);$i=$i+3)
    <div class="container">    
      <div class="row">
      @foreach(array_slice($products,$i,3) as $product)
      <a href="{{url('site/product-detail')}}{{'/'.$product['id']}}">
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">{{$product['title']??''}}</div>
            <div class="panel-body"><img src="{{isset($product['image_path'])?asset($product['image_path']):'https://placehold.it/150x80?text=IMAGE'}}" 
              class="img-responsive" style="width:100%" alt="Image"></div>
            <div class="panel-footer">{{$product['model']??''}}</div>
          </div>
        </div> 
       </a> 
      @endforeach        
      </div>
    </div><br>
  @endfor
@endif

<br/>

<footer class="container-fluid text-center footer">
  <p>Online Store Copyright</p>  
  <form class="form-inline">Get deals:
    <input type="email" class="form-control" size="50" placeholder="Email Address">
    <button type="button" class="btn btn-danger">Sign Up</button>
  </form>
</footer>

</body>
<script src="{{asset('js/site.js')}}"></script>
<script type="text/javascript">

</script>

</html>
