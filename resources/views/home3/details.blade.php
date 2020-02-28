@extends('welcome3')

@section('cat_feature')
{!! $seoComment->fbcomment !!}
          @foreach($news as $n)
          <div class="single-post">
            
            <div class="post-title-area">
              <a class="post-cat" href="#">{{$n->category->name}}</a>
              <h2 class="post-title">
                {{$n->title}}
              </h2>
              <div class="post-meta">
                <span class="post-author">
                  By <a>{{$n->user_name}}</a>
                </span>   
                <span class="post-date"><i class="fa fa-clock-o"></i> {{$n->updated_at->toFormattedDateString()}}</span>
                <span class="post-hits"><i class="fa fa-eye"></i> {{$n->hit_count}}</span>
              </div>
            </div><!-- Post title end -->

            <div class="post-content-area">
              <div class="post-media post-featured-image">
              <a href="{{asset('public/images/'.$n->image)}}" class="gallery-popup cboxElement">
                <img src="{{asset('public/images/'.$n->image)}}" class="img-responsive" alt="">
                </a>
              </div>
              <div class="entry-content">
                {!! $n->details !!}
              </div><!-- Entery content end -->


    <div class="comments-form">
    <?php  $site = $seoComment->siteurl ?>
            <h3 class="title-normal">Leave a comment</h3>
      <div class="fb-comments" data-href="{{url(''.$site.$n->id)}}" data-numposts="5"></div>
    </div><!-- Comments form end -->



          <div class="related-posts ">
            <h3 class="block-title"><span>Related Posts</span></h3>

            <div id="latest-news-slide" class="owl-carousel owl-theme latest-news-slide">

            @foreach($latestNews as $n)
              <div class="item">
                <div class="post-block-style clearfix">
                  <div class="post-thumb">
                    <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">
                    <img class="img-responsive" src="{{asset('public/images/'.$n->image)}}" alt="" /></a>
                  </div>
                  <div class="post-content">
                    <p class="post-title ">
                      <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                    </p>
                    <div class="post-meta">
                      <span class="post-author"><a>{{$n->user_name}}</a></span>
                      <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
                    </div>
                  </div><!-- Post content end -->
                </div><!-- Post Block style end -->
              </div>
              @endforeach

            </div><!-- Carousel end -->
          </div><!-- Related posts end -->
              
            </div><!-- post-content end -->
          </div><!-- Single post end -->
          @endforeach

@stop


<div class="gap-40"></div>
