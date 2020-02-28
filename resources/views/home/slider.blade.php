@extends('welcome')

@section('slider')
<div class="col-md-12 col-xs-12 pad-r">  
    <div id="featured-slider" class="owl-carousel owl-theme featured-slider">
        @if($slider)
            @foreach($slider as $n)
                <div class="item" style="background-image:url({{asset('/uploads/slider/'.$n->image)}})">
                    <div class="featured-post">
                        <div class="post-content">
                            <h2 class="post-title title-extra-large">
                                <a href="{{ $n->link }}">{{$n->title}}</a>
                            </h2>
                            <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
                        </div>
                    </div><!--/ Featured post end -->
                </div><!-- Item 2 end -->
            @endforeach
        @endif
    </div><!-- Featured owl carousel end-->
</div><!-- Col 6 end --> 

{{--       

  <div class="col-md-7 col-xs-12 pad-r">
    <div id="featured-slider" class="owl-carousel owl-theme featured-slider">
    @foreach($slider as $n)
      <div class="item" style="background-image:url({{asset('public/images/'.$n->image)}})">
        <div class="featured-post">
          <div class="post-content">
            <a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->slug)}}">{{$n->category->name}}</a>
            <h2 class="post-title title-extra-large">
              <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
            </h2>
            <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
          </div>
        </div><!--/ Featured post end -->
      </div><!-- Item 1 end -->
    @endforeach
    </div><!-- Featured owl carousel end-->
  </div><!-- Col 7 end -->


        <div class="col-md-5 col-xs-12 pad-l">
          <div class="row">
            <div class="col-sm-12">
            @foreach($slider2 as $n)
              <div class="post-overaly-style contentTop hot-post-top clearfix">
                <div class="post-thumb">
                  <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">
                    <img class="img-responsive" src="{{asset('public/images/'.$n->image)}}" alt="" />
                  </a>
                </div>
                <div class="post-content">
                  <a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->slug)}}">{{$n->category->name}}</a>
                  <h2 class="post-title title-large">
                    <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                  </h2>
                  <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
                </div>
              </div>
              @endforeach
            </div>

            @foreach($slider3 as $n)
            <div class="col-sm-6 pad-r-small">
              <div class="post-overaly-style contentTop hot-post-bottom clearfix">
                <div class="post-thumb">
                  <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">
                  <img class="img-responsive" src="{{asset('public/images/'.$n->image)}}" alt="" />
                  </a>
                </div>
                <div class="post-content">
                  <a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->slug)}}">{{$n->category->name}}</a>
                  <h2 class="post-title title-medium">
                    <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                  </h2>
                </div>
              </div>
            </div>
            @endforeach


          </div>
        </div> --}}


@stop