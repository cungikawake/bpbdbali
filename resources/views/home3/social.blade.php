@extends('welcome3')

@section('search')

<div class="search-area  col-sm-1 col-md-1 pull-right">
	<div class="nav-search" style="top: 2px;">
		<span id="search"><i class="fa fa-search"></i></span>
	</div>
      
        <div class="search-block" style="display: none;">
          <form action="{{url('/search')}}" method="get">
            <input type="text" class="typeahead form-control" id="searchinput" name="searchinput" placeholder="Type what you want and enter">
            <!-- <input type="text" class="typeahead  form-control" id="searchinput" name="searchinput" placeholder="Type what you want and enter"> -->
            <span class="search-close">&times;</span>
          </form>
        </div><!-- Site search end -->

</div>
@stop

@section('social-top')
		<div class="col-md-4 col-sm-4 col-xs-12 top-social text-right">
			<ul class="unstyled">
				<li>
					@foreach($Social as $s)
	                 <a title="{{$s->name}}" href="{{$s->link}}" target="_blank">
	                    <span class="social-icon">{!!$s->code!!}</span>
	                 </a>
	                @endforeach
				</li>
			</ul><!-- Ul end -->
		</div><!--/ Top social col end -->
@stop

@section('follow-us')
<div class="widget">
  <h3 class="block-title"><span>Follow Us</span></h3>
  <ul class="social-icon">
  @foreach($Social as $s)
    <li><a href="{{$s->link}}" target="_blank">{!!$s->code!!}</a></li>
    @endforeach
  </ul>
</div><!-- Widget Social end -->

@stop