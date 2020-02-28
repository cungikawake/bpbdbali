@extends('welcome2')
@section('widgetCuaca')					
	<div class="col-md-12 col-xs-12 pad-l">
	  	<div class="row">
		    <div class="col-md-3 col-xs-6">
		      <div class="form-group text-center">
		        <a href="{{ url('cuaca-bali') }}">
		        	<img src="{{asset('/images/weather.png')}}" alt="bali">
		        	<h4>Informasi Cuaca Bali</h4>
		    	</a>
		      </div>
		    </div>
		    <div class="col-md-3 col-xs-6">
		      <div class="form-group text-center">
		        <a href="{{ url('cuaca-pelabuhan') }}">
		        	<img src="{{asset('/images/tsunami.png')}}" alt="bali">
		        	<h4>Informasi Cuaca Pelabuhan</h4>
		    	</a>
		      </div>
		    </div>
		    <div class="col-md-3 col-xs-6">
		      <div class="form-group text-center">
		        <a href="{{ url('cuaca-bandara') }}">
		        	<img src="{{asset('/images/wind.png')}}" alt="bali">
		        	<h4>Informasi Cuaca Bandara</h4>
		    	</a>
		      </div>
		    </div>
		    <div class="col-md-3 col-xs-6">
		      <div class="form-group text-center">
		      	<a href="{{ url('gempa-terkini') }}">
		        	<img src="{{asset('/images/earthquake.png')}}" alt="bali">
		        	<h4>Informasi Gempa Terkini</h4>
		    	</a>
		      </div>
		    </div> 
	  	</div><!-- Row end --> 
	</div> 
@stop