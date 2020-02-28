<!DOCTYPE html>
<html lang="en">
<head>

	<!-- Basic Page Needs
	================================================== -->
  <meta charset="utf-8">
  <title>{{$Gsetting->title}}</title>
  <meta name="keywords" content="{{$seoComment->metakeyword}}">
  <link rel="icon" href="{{asset('/images/'.$Gsetting->default_img)}}" type="image/x-icon">

	<!-- Mobile Specific Metas
	================================================== -->

	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
  
	
	<!-- CSS
	================================================== -->
	  
  <!-- Bootstrap -->
  {{--<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">--}}
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

  <!-- Template styles-->
  <link rel="stylesheet" href="{{asset('/assets/css/style.css')}}">
  <!-- Responsive styles-->
  <link rel="stylesheet" href="{{asset('/assets/css/responsive.css')}}">    
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{asset('/assets/css/font-awesome.min.css')}}">
  <!-- Animation -->
  <link rel="stylesheet" href="{{asset('/assets/css/animate.css')}}">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="{{asset('/assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('/assets/css/owl.theme.default.min.css')}}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{asset('/assets/css/colorbox.css')}}">
  <link rel="stylesheet" href="{{asset('/css/sweetalert.css')}}">

  <style type="text/css">
    img{
      	display: block;
	    max-width: 100%;
	    height: auto;
    }
    .img-responsie{
    	display: block;
	    max-width: 100%;
	    height: auto;
    }
  </style>
</head>
	
<body>
	<div class="body-inner">

	<div id="top-bar" class="top-bar" >
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-sm-8 col-xs-12">
					<div class="ts-date">
						<i class="fa fa-calendar-check-o"></i>{{ Carbon\Carbon::now()->toFormattedDateString()}}
					</div>
					<ul class="unstyled top-nav" style="display: none;">
			            <li><a href="{{url('/about-us')}}">About</a></li>
			            <li><a href="{{url('/site-map')}}">Site Map</a></li>
			            <li><a href="{{url('/privacy')}}">Privacy</a></li>
			            <li><a href="{{url('/contact-us')}}">Contact</a></li>
					</ul>
				</div><!--/ Top bar left end -->

				@yield('social-top')
			</div><!--/ Content row end -->
		</div><!--/ Container end -->
	</div><!--/ Topbar end -->

	<!-- Header start -->
	<header id="header" class="header" style="">
		<div class="container">
			<img src="{{asset('/images/headerbaru.png')}}" alt="bali" style="width: 100%;" > 
		</div><!-- Logo and banner area end -->
	</header><!--/ Header end -->

	@include('home2.menu') 
	 
	 
	<section class="featured-post-area no-padding">
		<div class="container">
			<div class="row"> 
				@yield('slider') 
				@yield('CuacaExtream') 
			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- Trending post end -->

	{{--
	@yield('single-post')
	--}}

	<section class="block-wrapper" style="margin-top: -20px;">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
					@yield('widgetCuaca')

					@yield('cat_feature') 
 
					{{-- @yield('add-leftSide') --}}

					<div class="gap-30"></div> 

					@yield('gempaDirasakan')

					 
					@yield('latest') 

					@yield('cuacaToday')  
					
					@yield('situsTerkait')

					{{--@yield('categoryNews')--}}


				</div><!-- Content Col end -->

				<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
					<div class="sidebar sidebar-right">
						{{--@yield('popular')--}}

						@yield('sidebar_gempaDirasakan')

						@yield('Infografy')

						{{-- @yield('add-right') --}}

						
					</div><!-- Sidebar right end -->
				</div><!-- Sidebar Col end -->

			</div><!-- Row end -->
		</div><!-- Container end -->
	</section><!-- First block end -->

	{{-- @yield('add-three')  --}}

	@yield('video')



	<footer id="footer" class="footer" style="background: #f5f5f5; margin-top:-100px;">
		<div class="footer-main">
			<div class="container">
				<div class="row">
					<style>
						.morecontent span {
						    display: none;
						}
						.morelink {
						    display: block;
						}
					</style>

					<div class="col-md-4 m-0 col-sm-12 footer-widget widget-categories"> 
						<h3 class="block-title"><span>Profile</span></h3>
						<img src="{{ asset('assets/images/ketua.jpg') }}" class="img-responsie" width="200" style="text-align:center; margin:0 auto;">
						<p class="text-center" style="color: #000;">Drs. I MADE RENTIN, AP., M.Si.</p>
						<p class="text-center" style="color: orange;">Kepala Pelaksana Badan Penanggulangan Bencana Daerah Provinsi Bali</p>
						<p class="text-justify more">
							Salam Tangguh !!! Selamat datang di website Badan Penanggulangan Bencana Daerah (BPBD) Provinsi Bali. BPBD Provinsi Bali mengampu misi ke-19 dari Visi dan Misi Gubernur Bali yaitu mengembangkan sistem keamanan terpadu yang ditopang dengan sumber daya manusia serta sarana prasarana yang memadai untuk menjaga keamanan daerah dan krama Bali serta keamanan para wisatawan. Website ini merupakan sarana untuk memberikan informasi kebencanaan yang ada di seluruh Provinsi Bali, informasi peringatan dini, pengetahuan dan upaya penanggulangan bencana serta sharing kinerja dan kegiatan BPBD Provinsi Bali kepada masyarakat luas baik pada saat pra bencana, tanggap darurat maupun pasca bencana. Melalui website BPBD Provinsi Bali, mari kita membangun kemitraan yang saling membantu, memperkuat dan saling menguntungkan dalam pertukaran informasi kebencanaan berlandaskan kearifan lokal Bali yang dipadukan dengan kemajuan IT guna mewujudkan NANGUN SAT KERTHI LOKA BALI melalui Pola Pembangunan Semesta Berencana menuju Bali Era Baru. Kiranya website ini bisa menjadi referensi bagi masyarakat yang ingin mendapatkan informasi kebencanaan yang ada di Provinsi Bali.  
						</p> 
						
					</div><!-- Col end -->

		          	<div class="col-md-4  m-0 col-sm-12 footer-widget twitter-widget"> 
						@yield('popular')
		          	</div><!-- Col end -->

					<div class="col-md-4  m-0  col-sm-12 footer-widget twitter-widget"> 
			            @yield('article')
		          	</div><!-- Col end -->

				</div><!-- Row end -->
			</div><!-- Container end -->
		</div><!-- Footer main end --> 
	</footer><!-- Footer end -->
	<footer class="footer" style="padding:30px 0;">
		<div class="footer-main text-center" style="background: #1c1c1c;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 text-center">
						<img  src="{{asset('/images/'.$Gsetting->logo)}}" alt="" style="width: auto; text-align: center; display:  inline;" />
						<h4 style="color: #fff;">Badan Penanggulangan Bencana Daerah (BPBD) Prov. BALI</h4>
					</div><!-- Col end -->
					<div class="col-md-4 text-left">
						<h3 class="widget-title" style="text-align: center;">Alamat</h3>
						<p>
							<i class="fa fa-home"></i>  Jalan D.I Panjaitan No. 6 Renon - Denpasar 80235
						</p>
						<p><i class="fa fa-phone"></i> Telp. 0361 - 245397</p>
						<p><i class="fa fa-fax"></i> Fax. 0361 - 245395</p>
				        <p><i class="fa fa-envelope-o"></i> {{$Gsetting->email}}</p>
				        <p><i class="fa fa-world"></i> Website : bpbd.baliprov.go.id</p>
					</div><!-- Col end -->
					<div>
						<h3 class="widget-title">Media Sosial</h3>
						@yield('social-footer')
					</div><!-- Col end -->

				</div><!-- Row end -->
			</div><!-- Container end -->
		</div><!-- Footer info end -->
	</footer>

	<div class="copyright">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-6" style="margin:0 auto; text-align:center;">
					<div class="copyright-info">
						<span>Copyright © 2019 Badan Penanggulangan Bencana Daerah (BPBD) Prov. BALI.</span>
					</div>
				</div> 
			</div><!-- Row end -->

			<div id="back-to-top" data-spy="affix" data-offset-top="10" class="back-to-top affix">
				<button class="btn btn-primary" title="Back to Top">
					<i class="fa fa-angle-up"></i>
				</button>
			</div>

		</div><!-- Container end -->
	</div><!-- Copyright end -->

	<!--modal-->
	@yield('modal_info')

	<!-- Javascript Files
	================================================== -->

	<!-- initialize jQuery Library -->
	<script type="text/javascript" src="{{asset('/assets/')}}/js/jquery.js"></script>
	<!-- Bootstrap jQuery -->
	<script type="text/javascript" src="{{asset('/assets/')}}/js/bootstrap.min.js"></script>
	
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>

	<!-- Owl Carousel -->
	<script type="text/javascript" src="{{asset('/assets/')}}/js/owl.carousel.min.js"></script>
	<!-- Counter -->
	<script type="text/javascript" src="{{asset('/assets/')}}/js/jquery.counterup.min.js"></script>
	<!-- Waypoints -->
	<script type="text/javascript" src="{{asset('/assets/')}}/js/waypoints.min.js"></script>
	<!-- Color box -->
	<script type="text/javascript" src="{{asset('/assets/')}}/js/jquery.colorbox.js"></script>
	<!-- Smoothscroll -->
	<script type="text/javascript" src="{{asset('/assets/')}}/js/smoothscroll.js"></script>


	<!-- Template custom -->
	<script type="text/javascript" src="{{asset('/assets/')}}/js/custom.js"></script>
	<script type="text/javascript">
    var path = "{{ route('autocomplete.ajax') }}";
    $('input.typeahead').typeahead({
        source:  function (query, process) {
        return $.get(path, { query: query }, function (data) {
                return process(data);
            });
        }
    });

    $(document).ready(function() { 
    	// $('#myModalInfo').show(); 

    	$('.close').click(function(){
    		$('#myModalInfo').hide();
    	});

    	//dropdown menu
    	$('.dropdown-toggle').click(function(e) {
		  if ($(document).width() > 768) {
		    e.preventDefault();

		    var url = $(this).attr('href');

		       
		    if (url !== '#') {
		    
		      window.location.href = url;
		    }

		  }
		});
    });


	</script>

  @include('Alerts::alerts')
  @yield('script')
	
	<script>
		$(document).ready(function() {
		    // Configure/customize these variables.
		    var showChar = 107;  // How many characters are shown by default
		    var ellipsestext = "...";
		    var moretext = "(Selengkapnya...)";
		    var lesstext = "(Tutup...)";
		    

		    $('.more').each(function() {
		        var content = $(this).html();
		 
		        if(content.length > showChar) {
		 
		            var c = content.substr(0, showChar);
		            var h = content.substr(showChar, content.length - showChar);
		 
		            var html = c + '<br><span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
		 
		            $(this).html(html);
		        }
		 
		    });
		 
		    $('.morelink').click(function(){
		        if($(this).hasClass('less')) {
		            $(this).removeClass('less');
		            $(this).html(moretext);
		        } else {
		            $(this).addClass('less');
		            $(this).html(lesstext);
		        }
		        $(this).parent().prev().toggle();
		        $(this).prev().toggle();
		        return false;
            });
            

            $.ajax({
                type:'get',
                dataType:'json',
                url: '{{ URL::route('popup') }}',
                beforeSend:function(){

                },
                success: function(response){ 
                    if(response.data){
                        $('#popup-title').html(response.data.title);
                        $("#popup-url").attr("href", response.data.url);
                        $("#popup-image").attr("src", '{{ URL::asset('/uploads/popup_infos/') }}'+'/'+response.data.image);
                        // $('#myModalInfo').show(); 
                        $('#myModalInfo').modal('toggle')
                    }
                },
                error: function(data){

                }
            });
		});
	</script>

	</div><!-- Body inner end -->
</body>


</html>