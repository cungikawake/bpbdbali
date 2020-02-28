
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
              <style type="text/css">
                .dropdown:hover .dropdown-menu {
                  display: block;
                }
              </style>
              <ul class="nav navbar-nav">

              <li><a href="{{url('/')}}">Home</a></li>
              
              @foreach($catMenu  as $cat) 
                @if($cat->parent_id == 0 && $cat->sub_menu == 0)
                  <li><a href="{{url('/v/'.$cat->id.'/'.$cat->slug)}}">{{$cat->name}}</a></li> 
                @endif   
              @endforeach

              @foreach($catMenu  as $cat) 
                @if(isset($subMenu[$cat->id]))
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">{{$cat->name}} <i class="fa fa-angle-down"></i></a>
                        
                        <ul class="dropdown-menu">  
                          
                          @foreach($subMenu[$cat->id]  as $subcat)
                            <li><a href="{{url('/v/'.$subcat->id.'/'.$subcat->slug)}}">{{$subcat->name}}</a></li>
                          @endforeach 

                        </ul>
                    </li>
                @endif 
              @endforeach

               
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true">Galeri <i class="fa fa-angle-down"></i></a>
                  <ul class="dropdown-menu"> 
                    <li><a href="{{url('/gallery/foto')}}">Foto</a></li> 
                    <li><a href="{{url('/gallery/videos')}}">Video</a></li>
                  </ul>
                </li><!-- Galeri menu end -->


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

