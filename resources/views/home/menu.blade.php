
  <div class="main-nav clearfix">
    <div class="container">
      <div class="row">
        <nav class="site-navigation navigation">
          <div class="site-nav-inner pull-left">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>

            <div class="collapse navbar-collapse navbar-responsive-collapse">
              <ul class="nav navbar-nav">

              <li><a href="{{url('/')}}">Home</a></li>
              @foreach($catMenu as $cat)
                <li><a href="{{url('/v/'.$cat->id.'/'.$cat->slug)}}">{{$cat->name}}</a></li>
              @endforeach

              
              @if($videoMenu->count() != 0)  
                <li class="dropdown mega-dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown">Video <i class="fa fa-angle-down"></i></a>
                  <div class="dropdown-menu mega-menu-content hidden-xs hidden-sm clearfix">
                    <div class="mega-menu-content-inner">
                      <div class="row">
                          
                      @foreach($videoMenu as $n)
                          <div class="col-md-6">
                            <div class="post-block-style clearfix">
                            <div class="post-thumb">{!!$n->url!!}</div>
                            <div class="post-content">
                              <h2 class="post-title title-small">
                                <a href="{{url('/videos/'.$n->id.'/'.$n->slug)}}">{{ str_limit( $n->title, 60) }}</a>
                              </h2>
                            </div><!-- Post content end -->
                          </div><!-- Post Block style end -->
                          </div><!-- Col 4 end -->
                      @endforeach


                        </div><!-- Post block row end -->
                    </div> 
                    
                  </div><!-- Mega menu content end -->
                </li><!-- Video menu end -->

                @endif

              </ul><!--/ Nav ul end -->
            </div><!--/ Collapse end -->

          </div><!-- Site Navbar inner end -->
        </nav><!--/ Navigation end -->

        
        <div class="nav-search">
          <span id="search"><i class="fa fa-search"></i></span>
        </div><!-- Search end -->
        
        <div class="search-block" style="display: none;">
          <form action="{{url('/search')}}" method="get">
            <input type="text" class="typeahead form-control" id="searchinput" name="searchinput" placeholder="Type what you want and enter">
            <!-- <input type="text" class="typeahead  form-control" id="searchinput" name="searchinput" placeholder="Type what you want and enter"> -->
            <span class="search-close">&times;</span>
          </form>
        </div><!-- Site search end -->

      </div><!--/ Row end -->
    </div><!--/ Container end -->

  </div><!-- Menu wrapper end -->

