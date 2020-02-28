@extends('dashboard')
@section('sub-title')
| Video
@stop

@section('content-title')
	Edit Gallery
	<a href="{{route('videos')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('style')
<link rel="stylesheet" href="{{asset('public/assets/admin/bootstrap/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@stop

@section('content')
<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
       <div class="box box-info">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
          <form class="form-horizontal"  method="post" action="{{route('updatevideos')}}">

            {{csrf_field()}}
              <div class="box-body">
               
               <input type="hidden" name="id" value="{{$id->id}}">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Videos Title :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="title" value="{{$id->title}}"  autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3 ">
                    <label class="control-label pull-right">Embeded Code:</label>
                  </div>
                  <div class="col-sm-8">
                  <textarea name="url" id="" cols="30" rows="5" class="form-control">{{$id->url}}</textarea>
                  </div>
                </div>

                  <div class="form-group">
                    <div class="col-sm-3 ">
                      <label class="control-label pull-right">Details  :
                      </label>
                    </div>
                    <div class="col-sm-8">
                      <!-- <input type="text" name="link" value="" class="form-control" autofocus > -->
                      <textarea class="textarea form-control" name="link" id="area2" style=" width: 100%; min-height: 420px;">{!! $id->link !!}</textarea>
                    </div>
                  </div>
                  
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Update</button>
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

<script src="{{asset('public/assets/admin/js/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script src="{{ asset('public/assets/admin/js/bootstrap-toggle.min.js') }}"></script>
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>

<script>
  $(function () {
    $(".textarea").wysihtml5();
  });
</script>
@stop