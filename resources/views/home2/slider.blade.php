@extends('welcome2')

@section('slider')
    <div class="col-md-12 col-xs-12 pad-r">  
        <div id="featured-slider" class="owl-carousel owl-theme featured-slider" style="height: auto; max-height: 350px;">
            @if($slider)
                @foreach($slider as $n)
                    <div class="item">
                      <img src="{{asset('/uploads/slider/'.$n->image)}}" style="height: auto; max-height: 350px;">
                    </div><!-- Item 2 end -->
                @endforeach
            @endif
        </div><!-- Featured owl carousel end-->
    </div><!-- Col 6 end --> 

    
    {{-- <div class="col-md-12 col-xs-12 pad-r">  
            <div id="featured-slider" class="owl-carousel owl-theme featured-slider">
                @if($slider)
                    @foreach($slider as $n)
                        <div class="item" style="background-image:url({{asset('/images/'.$n->image)}})">
                            <div class="featured-post">
                                <div class="post-content">
                                    <a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->slug)}}">{{$n->category->name}}</a>
                                    <h2 class="post-title title-extra-large">
                                        <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                                    </h2>
                                    <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
                                </div>
                            </div><!--/ Featured post end -->
                        </div><!-- Item 2 end -->
                    @endforeach
                @endif
            </div><!-- Featured owl carousel end-->
        </div><!-- Col 6 end -->  --}}
        
        
        
    {{--
        <div class="col-md-12 col-xs-12 pad-r">
          <div class="block color-red">
            <h3 class="block-title">
                <span>Berita Terkini</span>
            </h3>
          </div>
        </div>
        <div class="col-md-12 col-xs-12 pad-r">  
          <div id="featured-slider" class="owl-carousel owl-theme featured-slider">
            @foreach($slider as $n)
            <div class="item" style="background-image:url({{asset('/images/'.$n->image)}})">
              <div class="featured-post">
                <div class="post-content">
                  <a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->slug)}}">{{$n->category->name}}</a>
                  <h2 class="post-title title-extra-large">
                    <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                  </h2>
                  <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
                </div>
              </div><!--/ Featured post end -->
            </div><!-- Item 2 end -->
            @endforeach
          </div><!-- Featured owl carousel end-->
        </div><!-- Col 6 end -->

        <div class="col-md-12 col-xs-12 pad-l">
          <div class="row">

            @foreach($slider->take(4) as $n)
            <div class="col-md-3 col-sm-3 col-xs-6 pad-r-small">
              <div class="post-overaly-style contentTop fourNewsboxTop clearfix">
                <div class="post-thumb">
                  <a href="#">
                  <img class="img-responsive" src="{{asset('/images/'.$n->image)}}" alt=""/></a>
                </div>
                <div class="post-content">
                  <a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->slug)}}">{{$n->category->name}}</a>
                  <h2 class="post-title title-medium">
                    <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                  </h2>
                </div><!-- Post content end -->
              </div><!-- Post Overaly end -->
            </div><!-- Col end -->
            @endforeach
          </div><!-- Row end -->
        </div><!-- Col 6 end -->

      --}}


@stop