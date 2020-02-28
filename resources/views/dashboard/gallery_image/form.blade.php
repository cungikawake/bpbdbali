@extends('dashboard')

@section('sub-title')
| Gallery
@stop


@section('content-title')
	Form Gallery

	<a href="{{route('gallery.index')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('style')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

<link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/basic.css" rel="stylesheet" type="text/css" />
<style type="text/css">
    .dropzone {
        border:2px dashed #999999;
        border-radius: 10px;
    }
    .dropzone .dz-default.dz-message {
        height: 171px;
        background-size: 132px 132px;
        margin-top: -101.5px;
        background-position-x:center;

    }
    .dropzone .dz-default.dz-message span {
        display: block;
        margin-top: 145px;
        font-size: 20px;
        text-align: center;
    }
</style>
@stop

@section('content')

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
        <div class="box box-info">
            <div class="box-header with-border">
                @include('errors.errors')
            </div>

            <form class="form-horizontal"  method="post" action="@if($model->exists) {{ route('gallery.update', $model->id) }} @else {{ route('gallery.store') }} @endif" enctype="multipart/form-data">
                {{csrf_field()}}
                {{method_field($model->exists ? 'PUT' : 'POST')}}
                <div class="box-body">

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Title <span class="text-red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="title" class="form-control" value="{{old('title', $model->title)}}"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Image <span class="text-red">*</span></label>
                        <div class="col-sm-8">
                            <input type="file" name="image" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Status <span class="text-red">*</span></label>
                        <div class="col-sm-8">
                            {{-- <input type="text" name="status" value=""/> --}}
                            <select name="status" class="form-control">
                                <option value="1" {{old('status', $model->status) == 1 ? 'selected' : ''}}>Active</option>
                                <option value="0" {{old('status', $model->status) == 0 ? 'selected' : ''}}>Nonactive</option>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Save</button>
                </div>
            </form>

            <form action="{{ route('multifileupload') }}" enctype="multipart/form-data" class="dropzone" id="fileupload" method="POST">
                {{csrf_field()}}
                <div class="fallback">
                <input name="file" type="files" multiple accept="image/jpeg, image/png, image/jpg" />
                </div>
            </form>
        </div>
         
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
@stop


@section('script')

<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.css" rel="stylesheet">
<script src="{{ asset('assets/admin/js/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/bootstrap-fileinput.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>

<!-- InputMask -->
<script src="{{asset('assets/admin/plugins/input-mask/jquery.inputmask.js')}}"></script>
<script src="{{asset('assets/admin/plugins/input-mask/jquery.inputmask.date.extensions.js')}}"></script>
<script src="{{asset('assets/admin/plugins/input-mask/jquery.inputmask.extensions.js')}}"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script>
        $(function () {
      
          //Datemask dd/mm/yyyy
          $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
          //Datemask2 mm/dd/yyyy
          $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
          //Money Euro
          $('[data-mask]').inputmask()

          $('#toggle-one').bootstrapToggle();
        });
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/dropzone.js"></script>
<script type="text/javascript">
  Dropzone.options.fileupload = {
    accept: function (file, done) {
      if (file.type != "application/vnd.ms-excel" && file.type != "image/jpeg, image/png, image/jpg") {
        done("Error! Files of this type are not accepted");
      } else {
        done();
      }
    }
  }

Dropzone.options.fileupload = {
  acceptedFiles: "image/jpeg, image/png, image/jpg"
}

if (typeof Dropzone != 'undefined') {
  Dropzone.autoDiscover = false;
}


(function ($, window, undefined) {
  "use strict";

  $(document).ready(function () {
    // Dropzone Example
    if (typeof Dropzone != 'undefined') {
      if ($("#fileupload").length) {
        var dz = new Dropzone("#fileupload"),
          dze_info = $("#dze_info"),
          status = {
            uploaded: 0,
            errors: 0
          };
          
        var $f = $('<tr><td class="name"></td><td class="size"></td><td class="type"></td><td class="status"></td></tr>');
        dz.on("success", function (file, responseText) {

            var _$f = $f.clone();

            _$f.addClass('success');

            _$f.find('.name').html(file.name);
            if (file.size < 1024) {
              _$f.find('.size').html(parseInt(file.size) + ' KB');
            } else {
              _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            }
            _$f.find('.type').html(file.type);
            _$f.find('.status').html('Uploaded <i class="entypo-check"></i>');

            dze_info.find('tbody').append(_$f);

            status.uploaded++;

            dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

            toastr.success('Your File Uploaded Successfully!!', 'Success Alert', {
              timeOut: 50000000
            });

          })
          .on('error', function (file) {
            var _$f = $f.clone();

            dze_info.removeClass('hidden');

            _$f.addClass('danger');

            _$f.find('.name').html(file.name);
            _$f.find('.size').html(parseInt(file.size / 1024, 10) + ' KB');
            _$f.find('.type').html(file.type);
            _$f.find('.status').html('Uploaded <i class="entypo-cancel"></i>');

            dze_info.find('tbody').append(_$f);

            status.errors++;

            dze_info.find('tfoot td').html('<span class="label label-success">' + status.uploaded + ' uploaded</span> <span class="label label-danger">' + status.errors + ' not uploaded</span>');

            toastr.error('Your File Uploaded Not Successfully!!', 'Error Alert', {
              timeOut: 5000
            });
          });
      }
    }
  });
})(jQuery, window); 
</script>
@stop