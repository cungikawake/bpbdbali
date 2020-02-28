@extends('dashboard')

@section('sub-title')
| Video
@stop
@section('content-title')
	Add Video

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
            <!-- form start -->
            <form class="form-horizontal" id="" method="post" action="{{route('store')}}">

            {{csrf_field()}}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Videos Title :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="title"   autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3 ">
                    <label class="control-label pull-right">Embeded Code :
                    </label>
                    <!-- <p class="small pull-right">Size should be 260 X 180</p> -->
                  </div>
                  <div class="col-sm-8">
                    <textarea name="url" id="" cols="30" rows="5" class="form-control"></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-sm-3 ">
                    <label class="control-label pull-right">Details  :
                    </label>
                  </div>
                  <div class="col-sm-8">
                    <textarea class="textarea form-control" name="link" id="area2" style=" width: 100%; min-height: 420px;"></textarea>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Add  </button>
              </div>
              <!-- /.box-footer -->
            </form>

            @include('errors.errors')
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