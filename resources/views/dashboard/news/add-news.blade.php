@extends('dashboard')

@section('sub-title')
| News
@stop


@section('content-title')
	Add New News

	<a href="{{route('news')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
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
            <form class="form-horizontal"  method="post" action="{{route('savenews')}}" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="box-body">
                <div class="form-group">
                  <div class="col-sm-9 col-sm-offset-3">
                      <p class="btn btn-default"> 
                      <label class="checkbox-inline ">
                               <input type="checkbox" name="schedule">Schedule This News
                      </label>
                      </p>
                        
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">News Title *</label>
                  <div class="col-sm-8">
                    <input type="text" name="title" class="form-control"/>
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-3 control-label">Select News Category *</label>
                  <div class="col-sm-8">
                      <select name="category_id"  class="form-control" required>
                          <option value="">Select Category</option>
                        @foreach($category as $cat)
                          <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>



                <div class="form-group">
                  <label  class="col-sm-3 control-label">Featured Image *</label>
                  
                    <div class="col-sm-8 ">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="input-group input-large">
                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                          <i class="fa fa-file fileinput-exists"></i>&nbsp;
                          <span class="fileinput-filename"> </span>
                      </div>
                      <span class="input-group-addon btn default btn-file">
                      <span class="fileinput-new bold uppercase">
                       <i class="fa fa-picture-o"></i> Select image </span>
                       <span class="fileinput-exists bold uppercase"> Change </span>
                       <input type="file" name="image" > </span>
                       <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput"> Remove </a>
                        </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-3 control-label">News Details *</label>
                  <div class="col-sm-8">
                        <textarea class="textarea" name="details" id="editor" rows='10'></textarea>
                  </div>
            </div>


            <div class="form-group">
              <label  class="col-sm-3 control-label">Tag *</label>
                <div class="col-sm-8">
                    <input type="text" name="source" class="form-control" data-role="tagsinput" />
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-8">
                    <p class="btn btn-default"> 
                    <label class="checkbox-inline ">
                        <input type="checkbox" name="breaking" >Add to Breaking News
                    </label>
                    </p>              
                
                    <p class="btn btn-default"> 
                    <label class="checkbox-inline ">
                         <input type="checkbox"  name="featured">Add to Latest News
                    </label>
                    </p>              
                
                    <p class="btn btn-default"> 
                    <label class="checkbox-inline ">
                             <input type="checkbox" name="slider">Add to Home Slider
                    </label>
                    </p>              
                </div>
            </div>
            
              <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Add New Post</button>
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