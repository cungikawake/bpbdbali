@extends('dashboard')
@section('sub-title')
  | Gallery
@stop



@section('content-title')
	Edit Gallery

	<a href="{{route('gallery')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('content')

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
       <div class="box box-info">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="bootstrapTagsInputForm" method="Post">
              <div class="box-body">
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Gallery Title *</label>
                  <div class="col-sm-8">
                    <input type="title" class="form-control" id="inputEmail3" placeholder="News Title"  autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Image Upload *</label>
                  <div class="col-sm-8">
                        <div class="uploader__box js-uploader__box l-center-box">
                                  <div class="uploader__contents">
                                      <label class="button button--secondary" for="fileinput">Select Files</label>
                                      <input id="fileinput" class="uploader__file-input" type="file" multiple value="Select Files">
                                  </div>
                                <!-- <input class="button button--big-bottom" type="submit" value="Upload Selected Files"> -->
                          </div>
                  </div>
                </div>
                
                
                    
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Update Gallery </button>
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
<!-- <script src="http://code.jquery.com/jquery-1.12.4.min.js"></script> -->
<script src="{{asset('public/assets/admin/js/jquery.imageuploader.js')}}"></script>
<script>
(function(){
            var options = {};
            $('.js-uploader__box').uploader(options);
        }());
</script>
<script type="text/javascript">

  // var _gaq = _gaq || [];
  // _gaq.push(['_setAccount', 'UA-36251023-1']);
  // _gaq.push(['_setDomainName', 'jqueryscript.net']);
  // _gaq.push(['_trackPageview']);

  // (function() {
  //   var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  //   ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  //   var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  // })();

</script>
@stop