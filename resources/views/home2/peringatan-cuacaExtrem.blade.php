@extends('welcome2') 
@section('CuacaExtream')
 
<section class="block-wrapper cuacaExtream">
    <div class="container">
        <div class="row">  
          <div class="col-md-12" style="margin-bottom: 10px;">
            <div class="block color-red">
                <a href="#">
                  <h3 class="block-title">
                    <span>Peringatan Dini Cuaca Extrem</span>
                  </h3>
                </a>
                <marquee behavior="scroll" direction="left" style=" margin-top: -10px;" scrollamount="10">
                  <h4>{{ $peringatanCuacaExtream }}</h4>
                </marquee>
            </div>
          </div>
        </div>
    </div>
</section>
@stop