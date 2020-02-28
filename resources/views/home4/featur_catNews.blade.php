@extends('welcome4')
@section('categoryNews')

<div class="gap-40"></div>
  <section class="block-wrapper p-top-0">
    <div class="container">
      <div class="row">

       @foreach($catNews as $cat)
        <div class="col-md-4" style="margin-bottom: 25px;">
          <div class="block color-black">
            <a href="{{url('/v/'.$cat->id.'/'.$cat->slug)}}">
            <h3 class="block-title">
            <span>{{$cat->name}}</span>
            </h3></a>
            
            <div class="list-post-block">
              <ul class="list-post">
              @foreach($cat->posts()->take(3)->get()  as $n)
                <li class="clearfix">
                  <div class="post-block-style post-float clearfix">
                    <div class="post-thumb">
                    @if($n->image)
                      <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">
                        <img class="img-responsive" src="{{asset('public/images/'.$n->image)}}" alt="" />
                      </a>
                      @endif
                    </div><!-- Post thumb end -->

                    <div class="post-content">
                      <h2 class="post-title title-small">
                        <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                      </h2>
                      <div class="post-meta">
                        <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
                      </div>
                    </div>
                  </div>
                </li>
                @endforeach

              </ul>
            </div>

          </div>
        </div>

      @endforeach
      </div><!-- Row end -->
    </div><!-- Container end -->
  </section><!-- 2nd block end -->
@stop