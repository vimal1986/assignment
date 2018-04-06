@extends('layouts.base')

@push('styles')
<!-- Bootstrap CSS -->
<link rel="stylesheet"
      href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.min.css"
      integrity="sha256-5ad0JyXou2Iz0pLxE+pMd3k/PliXbkc65CO5mavx8s8=" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-clockpicker.css')}}"/>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.15/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/user-list.css') }}">
@endpush

@section('content')
    <div id="page-wrapper" class="list-blade">
        <div class="container-fluid">
            <div class="user-list">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h2>Add Product</h2>

                    </div>
                    @if(isset($errors)&&count($errors)>0)
                        @foreach($errors->all() as $error)
                            <!-- <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">x</span>

                                </button>
                                <strong>Error :</strong>{!! $error !!}
                            </div> -->

                        @endforeach
                    @endif


                    @if($is_edit)
                        @php($action = url('admin/add-product'))
                        @php($method = 'post')
                    @else
                        @php($action = url('admin/add-product'))
                        @php($method = 'post')
                    @endif
                    <div class="panel-body">
                        {{--Package Name--}}
                        <form method="{{$method}}" action="{{$action}}" novalidate id="formEvent"
                        enctype="multipart/form-data">
                            {{csrf_field()}}
                            @if($is_edit)
                                <input type="hidden" value="{{$product->id}}" name="product_id">
                            @endif
                        <div class="form-section">
                            <div class="row">
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Product Title<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title"
                                                   name="title"
                                                   value="{{$product->title?$product->title:Illuminate\Support\Facades\Input::old('title')}}"
                                                   placeholder="Enter Product Title" required/>
                                            @if($errors->has('title')) <p
                                                    class="help-block">{{$errors->first('title')}}</p> @endif
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
                                                   value="{{$product->year?$product->year:Illuminate\Support\Facades\Input::old('year')}}"
                                                   placeholder="Enter Product Title" required/>
                                            @if($errors->has('year')) <p
                                                    class="help-block">{{$errors->first('year')}}</p> @endif
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
                                                   value="{{$product->make?$product->make:Illuminate\Support\Facades\Input::old('make')}}"
                                                   placeholder="make" required/>
                                            @if($errors->has('make')) <p
                                                    class="help-block">{{$errors->first('make')}}</p> @endif
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
                                                   value="{{$product->model?$product->model:Illuminate\Support\Facades\Input::old('model')}}"                                                  
                                                   placeholder="model" required/>
                                            @if($errors->has('model')) <p
                                                    class="help-block">{{$errors->first('model')}}</p> @endif
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
                                                   {{$product->description?$product->description:Illuminate\Support\Facades\Input::old('description')}}
                                            </textarea>
                                           
                                            @if($errors->has('description')) <p
                                                    class="help-block">{{$errors->first('description')}}</p> @endif
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
                                                   value="{{$product->price?$product->price:Illuminate\Support\Facades\Input::old('price')}}"
                                                   placeholder="model" required/>
                                            @if($errors->has('price')) <p
                                                    class="help-block">{{$errors->first('price')}}</p> @endif
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
                                                   value="{{$product->other_information?$product->other_information:Illuminate\Support\Facades\Input::old('other_information')}}"
                                                   placeholder="description" required/>
                                            @if($errors->has('other_information')) <p
                                                    class="help-block">{{$errors->first('other_information')}}</p> @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Image<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                        {{--{{dd($image->image_url)}}--}}
                                            @if($product->image_url ?? false)
                                                <img src="{{ asset($product->image_url ?? "img/noimage.gif") }}"
                                                     height="200" width="200" class="img-responsive img-thumbnail"/>
                                            @endif
                                            <input type="file" id="image" name="image" class="form-control"
                                                   placeholder=" Image"
                                                   @if(!isset($product->image_url))
                                                   required
                                                    @endif
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
                                                   value="{{$product->description??''}}{{Illuminate\Support\Facades\Input::old('type')}}"
                                                   placeholder="description" required/> -->
                                            @if($errors->has('description')) <p
                                                    class="help-block">{{$errors->first('type')}}</p> @endif
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
                                        <a href="{{url('admin/')}}"
                                           class="btn cancel-btn btn-sha mg btnmgr-15">Cancel</a>
                                        @if($is_edit)
                                            <input type="submit" id="action_save" class="btn submit-btn btn-sha btnmgr-15"
                                                   value="Update">
                                        @else
                                            <input type="submit" id="action_save" class="btn submit-btn btn-sha btnmgr-15"
                                                   value="Save">
                                        @endif

                                    </div>
                                </div>
                            </div>

                        </form>
                        


                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script src="//code.jquery.com/ui/1.10.2/jquery-ui.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"
        integrity="sha256-urCxMaTtyuE8UK5XeVYuQbm/MhnXflqZ/B9AOkyTguo=" crossorigin="anonymous"></script>
<script src="{{ asset('/plugins/ckeditor/ckeditor.js')}}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.2/adapters/jquery.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.15/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.datatables.net/1.10.15/js/dataTables.bootstrap.min.js"></script>
{{--<script type="text/javascript"--}}
        {{--src="{{asset('js/jsValidator.v.2.js')}}"></script>--}}
<script type="text/javascript"
        src="{{ asset('/plugins/bootstrap-datetimepicker/moment.min.js') }}"></script>
<script type="text/javascript"
        src="{{ asset('/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}"></script>
<link rel="stylesheet"
      href="{{ asset('/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}">
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
@endpush