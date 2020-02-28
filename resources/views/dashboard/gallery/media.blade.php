@extends('dashboard')

@section('sub-title')
 | Media Gallery
@stop

@section('content-title')
Media Gallery
  
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title"></h3> -->
              
            <!-- /.box-header -->
            <div class="box-body">
        		@foreach($AllImage as $img)
            	<div class="col-lg-3">
				<a class="lightbox thumbnail" href="storage/app/{{ $img->image}}" data-littlelightbox-group="gallery" title="">
				<img src="storage/app/{{ $img->image}}" alt="{{$img->title}}" style="width: 250px;height: 180px;" /></a>
				</div>
				@endforeach
			</div>

            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

@stop


@section('script')

@stop

