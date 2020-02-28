@extends('welcome2')
 
@section('latest') 
     
<div class="latest-news block color-red" style="margin-top: -100px;">
  <h3 class="block-title"><span>Berita Terupdate</span></h3>
  <div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide">
  @foreach($news as $n)
    <div class="item">
          <div class="post-block-style clearfix">
<a class="post-cat" style="position:inherit;top:0;left:0;" href="{{url('/v/'.$n->category->id.'/'.$n->category->slug)}}">{{$n->category->name}}</a>
            <div class="post-thumb">
              <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}"><img class="img-responsive" src="{{asset('/images/'.$n->image)}}" alt="" /></a>
            </div>
            
            <div class="post-content">
              <h2 class="post-title title-medium">
                <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{substr($n->title, 0, 100)}}...</a>
              </h2>
              <div class="post-meta"> 
                <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
              </div>
            </div><!-- Post content end -->
          </div><!-- Post Block style end -->
    </div><!-- Item 1 end -->
    @endforeach
  </div><!-- Latest News owl carousel end-->
</div><!--- Latest news end -->

@stop