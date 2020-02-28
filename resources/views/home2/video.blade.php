@extends('welcome2')

@section('video')
	<section class="block-wrapper video-block">
		<div class="container">
			<div class="row">
				<div class="video-tab clearfix">
					<h2 class="video-tab-title">Watch Now</h2>
					<div class="col-md-7 pad-r-0">
						<div class="tab-content">
							<div class="tab-pane active animated fadeIn" id="video1">
								<div class="post-overaly-style clearfix">
								   <div class="post-thumb">
										<img class="img-responsive" src="{{asset('/assets/')}}/images/news/video/video4.jpg" alt="" />
										<a class="popup" href="https://www.youtube.com/embed/XhveHKJWnOQ?autoplay=1&amp;loop=1">
					                  <div class="video-icon">
					                  	<i class="fa fa-play"></i>
					               	</div>
					            	</a>
								   </div><!-- Post thumb end -->
								   <div class="post-content">
								      <a class="post-cat" href="#">Video</a>
								      <h2 class="post-title">
								         <a href="#">Is Running Good for You, Health Benefits of Morning Running</a>
								      </h2>
								   </div><!-- Post content end -->
								</div><!-- Post Overaly Article end -->
							</div><!--Tab pane 1 end-->

							<div class="tab-pane animated fadeIn" id="video2">
								<div class="post-overaly-style clearfix">
								   <div class="post-thumb">
								      <img class="img-responsive" src="{{asset('/assets/')}}/images/news/video/video3.jpg" alt="" />
										<a class="popup" href="https://www.youtube.com/embed/wJF5NXygL4k?autoplay=1&amp;loop=1">
					                  <div class="video-icon">
					                  	<i class="fa fa-play"></i>
					               	</div>
					            	</a>
								   </div><!-- Post thumb end -->
								   <div class="post-content">
								      <a class="post-cat" href="#">Video</a>
								      <h2 class="post-title title-medium">
								         <a href="#">Breeze through 17 locations in Europe in this breathtaking video</a>
								      </h2>
								   </div><!-- Post content end -->
								</div><!-- Post Overaly Article 2 end -->
							</div><!--Tab pane 2 end-->

							<div class="tab-pane animated fadeIn" id="video3">
								<div class="post-overaly-style clearfix">
								   <div class="post-thumb">
								      <img class="img-responsive" src="{{asset('/assets/')}}/images/news/video/video2.jpg" alt="" />
										<a class="popup" href="https://www.youtube.com/embed/DQNDcxRo-2M?autoplay=1&amp;loop=1">
					                  <div class="video-icon">
					                  	<i class="fa fa-play"></i>
					               	</div>
					            	</a>
								   </div><!-- Post thumb end -->
								   <div class="post-content">
								      <a class="post-cat" href="#">Video</a>
								      <h2 class="post-title title-medium">
								         <a href="#">TG G6 will have dual 13-megapixel cameras on the back</a>
								      </h2>
								   </div><!-- Post content end -->
								</div><!-- Post Overaly Article 2 end -->
							</div><!--Tab pane 2 end-->
							

						</div><!-- Tab content end -->
					</div><!--Tab col end -->

					<div class="col-md-5 pad-l-0">
						<ul class="nav nav-tabs">
						  	<li class="active">
						  		<a class="animated fadeIn" href="#video1" data-toggle="tab">
						  			<div class="post-thumb">
								        <img class="img-responsive" src="{{asset('/assets/')}}/images/news/video/video4.jpg" alt="" />
								   </div><!-- Post thumb end -->
						  			<h3>Is Running Good for You, Health Benefits of Morning Running</h3>
						  		</a>
						  	</li>
						  	<li>
							  	<a class="animated fadeIn" href="#video2" data-toggle="tab">
							  		<div class="post-thumb">
								      <img class="img-responsive" src="{{asset('/assets/')}}/images/news/video/video3.jpg" alt="" />
								   </div><!-- Post thumb end -->
						  			<h3>Breeze through 17 locations in Europe in this breathtaking video</h3>
							  	</a>
							</li>
						 	<li>
							  	<a class="animated fadeIn" href="#video3" data-toggle="tab">
							  		<div class="post-thumb">
								      <img class="img-responsive" src="{{asset('/assets/')}}/images/news/video/video2.jpg" alt="" />
								   </div><!-- Post thumb end -->
						  			<h3>TG G6 will have dual 13-megapixel cameras on the back</h3>
							  	</a>
							</li>
						</ul>
					</div><!--Tab nav col end -->
				</div><!-- Video tab end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- Video block end -->

@stop