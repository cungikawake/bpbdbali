@extend('welcome2')

@section('cat_feature')
       <div class="block color-black">
            <h3 class="block-title"><span>Search Results</span></h3>

            <div class="row">
            @if($news->count() == 0)
            <div class="col-md-12 col-sm-12">
            <h3 style="color: red"> Search Item not Found!!</h3>
            </div>
            @else

            @foreach($news as $n)
              <div class="col-md-6 col-sm-6" style="margin-bottom: 20px;">
                <div class="post-overaly-style last clearfix">
                  <div class="post-thumb">
                    <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">
                      <img class="img-responsive" src="{{asset('/images/'.$n->image)}}" alt="">
                    </a>
                  </div>
                  
                  <div class="post-content">
                    <a class="post-cat" href="{{url('/v/'.$n->category->id.'/'.$n->category->name)}}">{{$n->category->name}}</a>
                    <h2 class="post-title">
                      <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}} </a>
                    </h2>
                    <div class="post-meta">
                      <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span>
                    </div>
                  </div><!-- Post content end -->
                </div><!-- Post Overaly Article end -->
              </div><!-- Col 2 end -->
              @endforeach

            @endif
            </div><!-- Row end -->

          </div>

        <div class="text-center">  {!! $news->links('layouts.pagination') !!}</div>
@stop

