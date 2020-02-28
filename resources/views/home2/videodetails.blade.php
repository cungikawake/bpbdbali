@extends('welcome2')

@section('cat_feature')

<div class="block category-listing category-style2" style="margin-top: 25px;">
<h3 class="block-title"><span>Video Kegiatan</span></h3>
  <div class="row">
          @foreach($Video as $n)
          <div class="col-md-12">
            <h2 class="post-title">
                {{$n->title}}
            </h2>
            {!! $n->url !!}  
          </div><!-- Single post end -->

          @endforeach
    </div>

    <div class="text-center">{!! $Video->links('layouts.pagination') !!}</div> 
</div>
@stop


<div class="gap-40"></div>
