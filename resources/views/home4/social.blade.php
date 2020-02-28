@extends('welcome4')

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

@section('social-footer')
    <ul class="unstyled footer-social">
      <li>
      @foreach($Social as $s)
        <a title="{{$s->name}}" href="{{$s->link}}" target="_blank">
          <span class="social-icon">{!!$s->code!!}</span>
        </a>
      @endforeach
      </li>
    </ul>
@stop