@extends('welcome')

@section('cat_feature')

<div class="block category-listing category-style2" style="margin-top: 25px;">

	@foreach($news as $cat)
		<h3 class="block-title"><span>{{$cat->name}}</span></h3>

		<?php $data=  $cat->posts()->paginate(8); ?>
		@foreach($data as $n)
		<div class="post-block-style post-list clearfix">
			<div class="row">
				
				<div class="col-md-5 col-sm-6">
					<div class="post-thumb thumb-float-style">
					<a href="{{url('/v/'.$cat->id .'/'.$cat->slug.'/article/'.$n->id.'/'.$n->slug)}}">
					<img class="img-responsive" src="{{asset('/images/'.$n->image)}}" alt="">
					</a>
					</div>
				</div><!-- Img thumb col end -->

				<div class="col-md-7 col-sm-6">
					<div class="post-content">
			 			<h2 class="post-title title-large">
			 				<a href="{{url('/v/'.$cat->id .'/'.$cat->slug.'/article/'.$n->id.'/'.$n->slug)}}">{{substr($n->title, 0, 200)}}</a>
			 			</h2>
			 			<div class="post-meta">
			 				<span class="post-author"><a>{{$n->user_name}}</a></span>
				 			<span class="post-date">{{$n->created_at->toFormattedDateString()}}</span>
			 			</div>
			 			<p>{!! str_limit(strip_tags($n->details),200) !!}</p>
		 			</div><!-- Post content end -->
				</div><!-- Post col end -->
			</div><!-- 1st row end -->
		</div><!-- 1st Post list end -->
		@endforeach
	@endforeach
</div>
<div class="text-center">{!! $data->links('layouts.pagination') !!}</div> 

@stop



