@extends('welcome')
@section('add-header')

<div class="col-xs-12 col-sm-9 col-md-9 header-right">
  <div class="ad-banner pull-right">
    @foreach($AddTop as $v)
    <a href="{{url('/click-add/'.$v->id)}}" target="_blank"> 
      @if($v->advert_type == 1)
      <img class="img-responsive" src="{{asset('public/images/'.$v->val1)}}" alt="" />
      @else
          {!! $v->val !!}
      @endif
    </a>
    @endforeach
  </div>
</div>

    
@stop

@section('add-leftSide')
  <div class="block ">
  @foreach($Addleft as $v)
    <a href="{{url('/click-add/'.$v->id)}}" target="_blank"> 
      @if($v->advert_type == 1)
        <img class="img-responsive" src="{{asset('public/images/'.$v->val1)}}" alt="" />
      @else
        {!! $v->val !!}
      @endif
    </a>
  @endforeach
  </div>
@stop

@section('add-three')
  <section class="ad-content-area text-center no-padding">
    <div class="container">
      <div class="row">
        <div class="col-sm-12">
          @foreach($Addvertise as $v)
          <a href="{{url('/click-add/'.$v->id)}}" target="_blank"> 
              @if($v->advert_type == 1)
                <img class="img-responsive" src="{{asset('public/images/'.$v->val1)}}" alt="" />
              @else
                {!! $v->val !!}
              @endif
            </a>
          @endforeach
        </div>
      </div>
    </div>
  </section><br>
@stop

@section('add-right')  
  <div class="widget text-center">
      @foreach($Addright as $v)
        <a href="{{url('/click-add/'.$v->id)}}" target="_blank"> 
          @if($v->advert_type == 1)
            <img class="img-responsive" src="{{asset('public/images/'.$v->val1)}}" alt="" />
          @else
            {!! $v->val !!}
          @endif
        </a>
      @endforeach
  </div>
  <br>
  <div class="widget text-center">
    @foreach($Addright2 as $v)
        <a href="{{url('/click-add/'.$v->id)}}" target="_blank"> 
          @if($v->advert_type == 1)
            <img class="img-responsive" src="{{asset('public/images/'.$v->val1)}}" alt="" />
          @else
            {!! $v->val !!}
          @endif
        </a>
      @endforeach
  </div>
@stop