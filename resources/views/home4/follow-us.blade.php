@extends('welcome4')

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
