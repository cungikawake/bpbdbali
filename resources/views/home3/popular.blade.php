@extends('welcome3')

@section('popular')
          
            <div class="widget color-default">
              <h3 class="block-title"><span>Popular News</span></h3>
              <div class="list-post-block">
                <ul class="list-post">
                @foreach($popular as $n)
                  <li class="clearfix">
                    <div class="post-block-style post-float clearfix">
                      <div class="post-thumb">
                        <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">
                          <img class="img-responsive" src="{{asset('public/images/'.$n->image)}}" alt="" />
                        </a>
                        <a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->name)}}">{{$n->category->name}}</a>
                      </div><!-- Post thumb end -->

                      <div class="post-content">
                        <h2 class="post-title title-small">
                          <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}} </a>
                        </h2>
                        <div class="post-meta">
                          <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
                        </div>
                      </div><!-- Post content end -->
                    </div><!-- Post block style end -->
                  </li><!-- Li 1 end -->
                  @endforeach
                </ul><!-- List post end -->
              </div><!-- List post block end -->
            </div><!-- Popular news widget end -->
@stop