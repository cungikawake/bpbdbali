@extends('dashboard')

@section('sub-title')
 | Dashboard
@stop

@section('content-title')
	 Dashboard
@stop

@section('content')
<!-- Small boxes (Stat box) -->
      <div class="row" id="home">
        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$news->count()}}</h3>

              <p>Total News !</p>
            </div>
            <div class="icon">
              <i class="fa fa-newspaper-o "></i>
            </div>
            <a href="{{route('news')}}" class="small-box-footer">View All Posts <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$category->count()}}</h3>

              <p>Total Category ! </p>
            </div>
            <div class="icon">
              <i class="fa fa-sitemap "></i>
            </div>
            <a href="{{route('category')}}" class="small-box-footer">View All Category <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>{{$video->count()}}</h3>

              <p>Total Videos</p>
            </div>
            <div class="icon">
              <i class="fa fa-film "></i>
            </div>
            <a href="{{route('videos')}}" class="small-box-footer">View All Videos <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div><!-- ./col -->

        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
            
              <h3>{{$todayNews->count()}}</h3>
            
              <p>Todays News!</p>
            </div>
            <div class="icon">
              <i class="fa fa-calendar"></i>
            </div>
            <a href="{{route('news')}}" class="small-box-footer">View All News <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

		<div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>{{$ImageGallery->count()}}</h3>

              <p>Galleries </p>
            </div>
            <div class="icon">
              <i class="fa fa-camera "></i>
            </div>
            <a href="{{route('gallery')}}" class="small-box-footer">View All Galleries <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->


        <div class="col-lg-4 col-xs-8">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>{{$subscriber->count()}}</h3>

              <p>Subscribers ! </p>
            </div>
            <div class="icon">
              <i class="fa fa-comments "></i>
            </div>
            <a href="{{route('subscribers')}}" class="small-box-footer">View All Subscribers <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

      </div>
      <!-- /.row -->

      @stop