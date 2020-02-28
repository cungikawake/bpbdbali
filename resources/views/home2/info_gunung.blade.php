@extends('welcome2')
@section('Infografy')
<div class="widget color-default" style="margin-top: -30px;"> 
  <div class="list-post-block">
    <a href="http://lapor.go.id" target="_new">
    	<img src="{{asset('assets/images/lapor.jpg')}}" alt="bali">
    </a>
  </div><!-- List post block end --> 
  <div class="list-post-block">
    <a href="http://siki.baliprov.go.id/" target="_new">
      <img src="{{asset('assets/images/siki.png')}}" alt="bali">
    </a>
  </div><!-- List post block end --> 
</div><!-- Popular news widget end -->

<div class="widget color-default"> 
  <h3 class="block-title"><span>PETA KRB</span></h3>
  <div class="list-post-block">
     <img src="{{asset('/images/KRB_Agung.jpg')}}" alt="bali">
  </div><!-- List post block end --> 
</div><!-- Popular news widget end -->


<div class="widget color-default"> 
  <h3 class="block-title"><span>SIAGA LETUSAN GUNUNG AGUNG</span></h3>
  <div class="list-post-block">
    <img src="{{asset('/images/siaga_gunung_agung.jpeg')}}" alt="bali">
  </div><!-- List post block end --> 
</div><!-- Popular news widget end -->

 
@stop