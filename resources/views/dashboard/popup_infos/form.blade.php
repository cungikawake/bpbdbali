@extends('dashboard')

@section('sub-title')
| Popup Infos
@stop


@section('content-title')
	Form Popup Infos

	<a href="{{route('popup_infos.index')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('style')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
@stop

@section('content')

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
        <div class="box box-info">
            <div class="box-header with-border">
                @include('errors.errors')
            </div>

            <form class="form-horizontal"  method="post" action="@if($model->exists) {{ route('popup_infos.update', $model->id) }} @else {{ route('popup_infos.store') }} @endif" enctype="multipart/form-data">
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
                        <label class="col-sm-3 control-label">Url <span class="text-red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="url" class="form-control" value="{{old('url', $model->url)}}"/>
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
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Start <span class="text-red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="start" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask value="{{old('start', $model->start)}}" autocomplete="off"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Finish <span class="text-red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="finish" class="form-control" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask value="{{old('finish', $model->finish)}}" autocomplete="off"/>
                        </div>
                    </div>
                </div>

                <div class="box-footer">
                    <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Save</button>
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
        })
      </script>
@stop