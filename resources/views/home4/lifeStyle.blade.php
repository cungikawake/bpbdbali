@extend('welcome4')

@section('cat_feature')
          
          @foreach($catNews2 as $cat)
          <div class="block color-black">
            <a href="{{url('/v/'.$cat->id.'/'.$cat->slug)}}">
              <h3 class="block-title"><span>{{$cat->name}}</span></h3>
            </a>
              <div class="row">

              @foreach($cat->posts()->take(2)->get()  as $n)
                <div class="col-md-6 col-sm-6" style="margin-bottom: 20px;">
                <div class="post-overaly-style clearfix">
                  <div class="post-thumb">
                    <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">
                    <img class="img-responsive" src="{{asset('public/images/'.$n->image)}}" alt="">
                    </a>
                  </div>
                  <div class="post-content">
                    <!-- <a class="post-cat" href="#">Travel</a> -->
                    <h2 class="post-title">
                      <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                    </h2>
                    <div class="post-meta">
                      <span class="post-date">{{$n->updated_at->toFormattedDateString()}}</span> 
                    </div>
                  </div>
                </div>

              </div>
              @endforeach
              
            </div><!-- Row end -->
          </div>
          <div class="gap-40"></div>
          @endforeach
@stop
