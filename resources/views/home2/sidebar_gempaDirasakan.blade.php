@extends('welcome2')
@section('sidebar_gempaDirasakan')
<section class="block-wrapper cuacaToday">
    <div class="container">
      	<div class="row"> 
      		<div class="col-md-4">
      			<div class="block color-red">
		            <a href="#">
		              <h3 class="block-title">
		                <span>Gempa Terbaru Dirasakan</span>
		              </h3>
		            </a>
		        </div>
		        <div class="row">
		        	<style type="text/css">
		        		.gempa .panel{height: 300px; overflow: auto;}
		        	</style>
		        	<div class="col-md-12 gempa">{!! $getGempaM5 !!}</div>
		        	<div class="col-md-12 gempa">{!! $getGempaDirasakan !!}</div>
		        </div>
		        <p><u><em>Sumber :  BMKG</em></u></p>
		        <hr>
	    	</div>
      	</div>
    </div>
</section>
@stop