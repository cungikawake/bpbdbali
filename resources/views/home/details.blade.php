@extends('welcome')

@section('latest')
{!! $seoComment->fbcomment !!}
@foreach($news as $n)
<div class="single-post">
	
	<div class="post-title-area">
		<a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->slug)}}">{{$n->category->name}}</a>
		<h2 class="post-title">{{$n->title}}</h2>
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
			<a href="{{asset('public/images/'.$n->image)}}" class="gallery-popup cboxElement"><img src="{{asset('public/images/'.$n->image)}}" class="img-responsive" alt="image"></a>
		</div>

		<div class="entry-content">
			{!! $n->details !!}
		</div><!-- Entery content end -->

		<div class="tags-area clearfix">
			<div class="post-tags">
			<?php $source=  $n->source; $tags = explode(',', $source); ?>
				<span>Tags:</span>
				@foreach($tags as $tag)
					@if($tag)<a href="#"> # {{$tag}} </a>@endif
				@endforeach
			</div>
		</div><!-- Tags end -->

    <div class="comments-form">
    <?php  $site = $seoComment->siteurl ?>
            <h3 class="title-normal">Leave a comment</h3>
      <div class="fb-comments" data-href="{{url(''.$site.$n->id)}}" data-numposts="5"></div>
    </div><!-- Comments form end -->

        


	</div><!-- post-content end -->
</div>
@endforeach


@stop


<div class="gap-40"></div>
@section('categoryNews')
  <section class="block-wrapper">
    <div class="container">
      <div class="row">
       @foreach($catMenu->take(3) as $cat)
        <div class="col-md-4" style="margin-bottom: 25px;">
          <div class="block color-red">
            <a href="{{url('/v/'.$cat->id.'/'.$cat->slug)}}">
            <h3 class="block-title">
            <span>{{$cat->name}}</span>
            </h3></a>
            
            <div class="list-post-block">
              <ul class="list-post">
              @foreach($cat->posts()->take(4)->get()  as $n)
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