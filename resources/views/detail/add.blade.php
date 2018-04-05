@extends('layouts.partials.dashboard')

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
                        <h2>Add Banner</h2>

                    </div>
                    @if(isset($errors)&&count($errors)>0)
                        @foreach($errors->all() as $error)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert">
                                    <span aria-hidden="true">x</span>

                                </button>
                                <strong>Error :</strong>{!! $error !!}
                            </div>

                        @endforeach
                    @endif


                    @if($is_edit)
                        @php($action = url('admin/update-banner'))
                        @php($method = 'post')
                    @else
                        @php($action = url('admin/add-banner'))
                        @php($method = 'post')
                    @endif
                    <div class="panel-body">
                        {{--Package Name--}}
                        <form method="{{$method}}" action="{{$action}}" novalidate id="formEvent"
                        enctype="multipart/form-data">
                            {{csrf_field()}}
                            @if($is_edit)
                                <input type="hidden" value="{{$banner->id}}" name="banner_id">
                            @endif
                        <div class="form-section">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label class="control-label col-sm-2">Banner Title<span style="color:#ff5900">*</span></label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" id="title"
                                                   name="title"
                                                   value="{{$banner->title??''}}{{Input::old('title')}}"
                                                   placeholder="Enter Banner Title" required/>
                                            @if($errors->has('title')) <p
                                                    class="help-block">{{$errors->first('title')}}</p> @endif
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <br>


                            <div class="form-section">
                                <div class="row">

                                    <div>
                                        <div class="col-md-2"><label class="control-label col-sm-4" for="pwd">Image<span
                                                        style="color:#ff5900">*</span></label></div>
                                        <div class="col-md-4">
                                            {{--{{dd($image->image_url)}}--}}
                                            @if($banner->image_url ?? false)
                                                <img src="{{ asset($image->image_url ?? "img/noimage.gif") }}"
                                                     height="200" width="200" class="img-responsive img-thumbnail"/>
                                            @endif
                                            <input type="file" id="image" name="image" class="form-control"
                                                   placeholder=" Image"
                                                   @if(!isset($banner->image_url))
                                                   required
                                                    @endif
                                            >
                                        </div>
                                    </div>


                                </div>
                            </div>

                            {{--<br>--}}
                            {{--<div class="form-section">--}}
                                {{--<div class="row">--}}

                                    {{--<div>--}}
                                        {{--<div class="col-md-2"><label class="control-label col-sm-4" for="pwd">Video</label></div>--}}
                                        {{--<div class="col-md-4">--}}
                                            {{--{{dd($image->image_url)}}--}}
                                            {{--@if($blog->image_url ?? false)--}}
                                                {{--<img src="{{ asset($image->image_url ?? "img/noimage.gif") }}"--}}
                                                     {{--height="200" width="200" class="img-responsive img-thumbnail"/>--}}
                                            {{--@endif--}}
                                            {{--<input type="file" id="video" name="video" class="form-control"--}}
                                                   {{--placeholder=" video"--}}
                                                   {{--@if(!isset($blog->video_path))--}}
                                                   {{--required--}}
                                                    {{--@endif--}}
                                            {{-->--}}
                                        {{--</div>--}}
                                    {{--</div>--}}


                                {{--</div>--}}
                            {{--</div>--}}

                            <br>
                            <div class="row">
                                <input type="hidden" value="1" name="action_status">
                                <div class="col-sm-12">
                                    <div class="submit-cancel text-center">
                                        <a href="{{url(config('eta.adminRoute').'/banner')}}"
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
                        {{--End Package Description--}}


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