@extends('welcome4')

@section('cat_feature')

@foreach($Video as $n)
          <div class="single-post">
            
            <div class="post-title-area">
              
              <h2 class="post-title">
                {{$n->title}}
              </h2>
              <div class="post-meta">

                <span class="post-date"><i class="fa fa-clock-o"></i> {{$n->updated_at->toFormattedDateString()}}</span>
              </div>
            </div><!-- Post title end -->

            <div class="post-content-area">
              <div class="post-media post-featured-image">
              <a href="#" class="gallery-popup cboxElement">
                    {!! $n->url !!}  
                </a>
              </div>
              <div class="entry-content">
                {!! $n->link !!}
              </div><!-- Entery content end -->
              
            </div><!-- post-content end -->
          </div><!-- Single post end -->

          @endforeach




@stop


<div class="gap-40"></div>
