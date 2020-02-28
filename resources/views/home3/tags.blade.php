@extends('welcome3')

@section('tags')

<div class="widget widget-tags">
	<h3 class="block-title"><span>Tags</span></h3>
	<ul class="unstyled clearfix">
	@foreach($news as $n)

	<?php $source=  $n->source; $tags = explode(',', $source); ?>
                  
                  @foreach($tags as $tag)
                    @if($tag)<li><a href="#"> # {{$tag}} </a></li>@endif
                  @endforeach
  	
  	@endforeach
</ul>
</div><!-- Tags end -->
@stop