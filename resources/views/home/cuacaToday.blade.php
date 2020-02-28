@extends('welcome2')
@section('cuacaToday')
<section class="block-wrapper">
    <div class="container">
      <div class="row"> 
      	<div class="block color-black">
            <a href="{{url('/v/'.$cat->id.'/cuaca'.)}}">
              <h3 class="block-title">
                <span>Cuaca Hari Ini</span>
              </h3>
            </a>
      </div>
    </div>
</section>
@endsection