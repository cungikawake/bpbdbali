  <div class="trending-bar hidden-xs">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h3 class="trending-title">Breaking News </h3>
          <div id="trending-slide" class="owl-carousel owl-theme trending-slide">
          @foreach($news as $n)
            <div class="item">
               <div class="post-content">
                  <h2 class="post-title title-small">
                     <a href="{{url('/article/'.$n->id.'/'.$n->slug)}}">{{$n->title}}</a>
                  </h2>
               </div>
            </div>
          @endforeach

          </div><!-- Carousel end -->
        </div><!-- Col end -->
      </div><!--/ Row end -->
    </div><!--/ Container end -->
  </div><!--/ Trending end -->
