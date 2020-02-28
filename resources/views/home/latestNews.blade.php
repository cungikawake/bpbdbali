@extends('welcome')

@section('latest')
     
<div class="latest-news block color-red">
  <h3 class="block-title"><span>Latest News</span></h3>
  <div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide">
  @foreach($news as $n)
    <div class="item">
          <div class="post-block-style clearfix">
            <div class="post-thumb">
              <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}"><img class="img-responsive" src="{{asset('public/images/'.$n->image)}}" alt="" /></a>
            </div>
            <a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->slug)}}">{{$n->category->name}}</a>
            <div class="post-content">
              <h2 class="post-title title-medium">
                <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
              </h2>
              <div class="post-meta">
                <span class="post-author"><a >{{$n->user_name}}</a></span>
                <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
              </div>
            </div><!-- Post content end -->
          </div><!-- Post Block style end -->
    </div><!-- Item 1 end -->
    @endforeach
  </div><!-- Latest News owl carousel end-->
</div><!--- Latest news end -->
@stop