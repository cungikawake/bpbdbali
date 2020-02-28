@extends('dashboard')

@section('sub-title')
| Slider
@stop


@section('content-title')
	Form Slider

	<a href="{{route('slider.index')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('style')



@stop

@section('content')

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
        <div class="box box-info">
            <div class="box-header with-border">
                @include('errors.errors')
            </div>

            <form class="form-horizontal"  method="post" action="@if($model->exists) {{ route('slider.update', $model->id) }} @else {{ route('slider.store') }} @endif" enctype="multipart/form-data">
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
                        <label class="col-sm-3 control-label">Link <span class="text-red">*</span></label>
                        <div class="col-sm-8">
                            <input type="text" name="link" class="form-control" value="{{old('link', $model->link)}}"/>
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
<script src="{{ asset('public/assets/admin/js/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.11/summernote.js"></script>
<script>
        $(document).ready(function() {
            $('#editor').summernote({
                height: 200
            });
        });
</script>


<script>
$(document).ready(function () {
    $('#bootstrapTagsInputForm')
        .find('[name="source"]')
            .change(function (e) {
                $('#bootstrapTagsInputForm').formValidation('revalidateField', 'source');
            })
            .end()
        
        .formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                source: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter at least one tag you like the most.'
                        }
                    }
                }
            }
        });
});
</script>
@stop