@extends('welcome2')

@section('cat_feature')

<div class="block category-listing category-style2" style="margin-top: 25px;">
<h3 class="block-title"><span>Foto Kegiatan</span></h3>
  <div class="row">
          @foreach($Fotos as $n)
          <div class="col-md-4">
            <h2 class="post-title">
                {{$n->title}}
            </h2>
            <img src="{!! asset('uploads/gallery/'.$n->image) !!} " alt="bpbd bali" class="img img-responsive"> 
          </div><!-- Single post end -->

          @endforeach
    </div>

    <div class="text-center">{!! $Fotos->links('layouts.pagination') !!}</div> 
</div>
@stop


<div class="gap-40"></div>
