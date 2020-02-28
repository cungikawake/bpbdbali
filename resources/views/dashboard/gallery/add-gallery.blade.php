@extends('dashboard')
@section('sub-title')
  | Gallery
@stop

@section('content-title')
	Add Gallery

	<a href="{{route('gallery')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('content')
<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
       <div class="box box-info">
            <div class="box-header with-border">
             <h1> Upload Photo</h1>
             
               @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="gocover"></div>
                  <div id="response"></div>
                    <form method="POST" action="{{route('storeGallery')}}" id="add_form" class="form-horizontal form-label-left" novalidate  enctype="multipart/form-data">
                      {{csrf_field()}}
                      <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Gallery Title<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input class="form-control col-md-7 col-xs-12" name="title" placeholder="Gallery Title" required="required" type="text">
                        </div>
                      </div>
                                            
                <div id="image_forms">
                
                </div>
                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"></label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <button type="button" class="btn btn-default" id="add_image"><i class="fa fa-fw fa-plus"></i>Add Gallery Image</button>
                    </div>
                </div>
                      
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-md-offset-3">
                          <button id="add_ads" type="submit" class="btn btn-success btn-block">Add New Gallery</button>
                        </div>
                      </div>
                    </form>
  
            </div>
         
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->


@stop

@section('script')

@stop