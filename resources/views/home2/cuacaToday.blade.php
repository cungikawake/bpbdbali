@extends('welcome2')
@section('cuacaToday')
<section class="block-wrapper cuacaToday">
    <div class="container">
      	<div class="row"> 
      		<div class="col-md-8" style="margin-bottom: 25px;">
      			<div class="block color-red">
		            <a href="#">
		              <h3 class="block-title">
		                <span>Informasi {{ $title_info }}</span>
		              </h3>
		            </a>
		        </div>
		        <div class="block">{!! $peringatanCuacaTerkini !!}</div>
		        <p><u><em>Sumber :  BMKG</em></u></p>
		        <hr>
	    	</div>
      	</div>
    </div>
</section>
@stop