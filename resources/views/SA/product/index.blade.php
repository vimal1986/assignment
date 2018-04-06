@extends('layouts.base')

@push('styles')
<!-- Bootstrap CSS -->
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/user-list.css') }}">
@endpush

@section('content')
    @if(isset($view))
       
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
                                    @if(isset($productDetail->image_path))
                                        <img  height="50" width="50" src="{{asset($productDetail->image_path)}}" alt="Product image" />
                                    @else
                                        <img  src="{{asset('image/user_image.png')}}" alt="Product image"/>
                                    @endif
                                </div>
                            </dl>
                        </div>
                        <div class="col-md-4">
                            <div class="form-horizontal">
                                <div class="form-group">
                                    <label class="control-label col-sm-4" for="email">Product Title:</label>
                                    <div class="col-sm-8">
                                        {{isset($productDetail->title)?$productDetail->title:''}}
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </section>
            </div>
        </div>
    @endif
    <div id="page-wrapper" class="list-blade">
        <div class="container-fluid">
            <div class="user-list">
                @if(Session::has('messages'))
                    <div class="alert alert-success hide-alert-message">
                        {{ Session::get('messages')}}
                    </div>
                    @php(Session::remove('success'))
                @endif
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                           <div class="col-sm-2 col-md-3">
                               <h2>Product List</h2>
                           </div>
                            <div class="col-sm-10 col-md-9 text-right">
                                <a class="btn btn-primary" href="{{url('admin/add-product')}}">Add Product</a>
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
                                
                                @if(isset($product)&&count($product))
                                    @php($i=1)
                                    @foreach($product as $list)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>{{ $list->title }}</td>
                                            <td>{{ $list->year }}</td>
                                            <td>{{ $list->make }}</td>
                                            <td>{{ $list->model }}</td>
                                            <td>{{ $list->price }}</td>
                                            <td>{{ $list->type }}</td>
                                            <td>
                                            <!-- {{dump($list->image_url)}} -->
                                            @if(isset($list->image_path))
                                                <img src="{{ asset($list->image_path ?? "img/noimage.gif") }}"
                                                     height="50" width="50" class="img-responsive img-thumbnail"/>
                                            @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin/view-product/' . $list->id) }}" >
                                                    <i class="fa fa-file" aria-hidden="true"></i>
                                                </a>
                                                 <a href="{{ url('admin/edit-product/' . $list->id) }}" >
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a class="product_delete" href="{{ url('admin/delete-product/' . $list->id) }}" >
                                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr><td colspan="8">No Record Found</td></tr>
                                @endif
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
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
@endpush
