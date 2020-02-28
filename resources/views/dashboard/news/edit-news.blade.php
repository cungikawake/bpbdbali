@extends('dashboard')

@section('sub-title')
| News
@stop


@section('content-title')
	Edit News

	<a href="{{route('news')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop
@section('style')
<link rel="stylesheet" href="{{asset('public/assets/admin/bootstrap/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">

@stop
@section('content')

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
       <div class="box box-info">
            <div class="box-header with-border">
                <h5>Last Edited:   <b style="color: red">
                @if($news->created_at) {{$news->updated_at->toDayDateTimeString()}} @endif</b></h5>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" name="editNewsForm" action="{{route('updatenews')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$news->id}}">
            
              <div class="box-body">
                <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3">
                    <p class="btn btn-default"> 
                    <label class="checkbox-inline ">
                             <input type="checkbox" name="schedule"
                                @if(old('schedule',$news->schedule)) checked  @endif 
                              >Schedule This News
                    </label>
                    </p>              
                </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">News Title *</label>
                  <div class="col-sm-8">
                    <input type="text" name="title" class="form-control" value="{{$news->title}}" required autofocus>
                  </div>
                </div>
                

                <div class="form-group">
                  <label  class="col-sm-3 control-label">Select News Category *</label>
                  <div class="col-sm-8">
                        <select name="category_id"  class="form-control">
                          <option value="">Select Category</option>
                        @foreach($category as $cat)
                          <option <?php if($cat->id == $news->category_id) echo 'Selected' ;?>  value="{{$cat->id}}"  >{{$cat->name}}</option>
                        @endforeach
                      </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Featured Image *</label>
                  <div class="col-sm-8">
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
                       <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>

                        <br>
                           @if($news->image == null)
                                    <p style="color: #f34f4f;">no Image here</p>
                          @else
                          <img src="{{ asset('public/images/'.$news->image) }}" width="180px" height="120px" alt=""/>
                          @endif
                    </div>
                </div><br>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">News Details *</label>
                  <div class="col-sm-8">  
                        <textarea class="textarea" name="details" id='editor' style="width: 100%; min-height: 420px;" rows="12" >{{$news->details}}</textarea>
                  </div>
            
            </div>
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Tag *</label>
              <div class="col-sm-8">
                    <input type="text" name="source" class="form-control" value="{{$news->source}}" 
                    data-role="tagsinput" />                
            </div>
          </div>

            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-9">
                    <p class="btn btn-default "> 
                    <label class="checkbox-inline ">
                             <input type="checkbox" name="breaking" 
                             @if(old('breaking',$news->breaking)) checked  @endif >
                             Add to Breaking News
                    </label>
                    </p>                              
                    <p class="btn btn-default"> 
                    <label class="checkbox-inline ">
                             <input type="checkbox" name="featured" 
                             @if(old('featured',$news->featured)) checked  @endif 
                             >Add to Latest News
                    </label>
                    </p>              
                
                    <p class="btn btn-default"> 
                    <label class="checkbox-inline ">
                             <input type="checkbox" name="slider" 
                             @if(old('slider',$news->slider)) checked  @endif 
                             >Add to Home Slider
                    </label>
                    </p>              
                </div>
            </div>
        </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Update News Post</button>
              </div>
              <!-- /.box-footer -->
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
            // Revalidate the cities field when it is changed
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