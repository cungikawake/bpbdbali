<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Basic Page Needs
  ================================================== -->
  <title>{{$Gsetting->title}}</title>
  <meta name="keywords" content="{{$Gsetting->populartag}}">
  <link rel="icon" href="{{asset('public/images/'.$Gsetting->default_img)}}" type="image/x-icon">

  <!-- Mobile Specific Metas
  ================================================== -->
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">


  <!-- CSS
  ================================================== -->
  
  <!-- Bootstrap -->
  <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}">
<!-- Template styles-->
  <link rel="stylesheet" href="{{asset('public/assets/css/style.css')}}">
  <!-- Responsive styles-->
  <link rel="stylesheet" href="{{asset('public/assets/css/responsive.css')}}">    
  <!-- FontAwesome -->
  <link rel="stylesheet" href="{{asset('public/assets/css/font-awesome.min.css')}}">
  <!-- Animation -->
  <link rel="stylesheet" href="{{asset('public/assets/css/animate.css')}}">
  <!-- Owl Carousel -->
  <link rel="stylesheet" href="{{asset('public/assets/css/owl.carousel.min.css')}}">
  <link rel="stylesheet" href="{{asset('public/assets/css/owl.theme.default.min.css')}}">
  <!-- Colorbox -->
  <link rel="stylesheet" href="{{asset('public/assets/css/colorbox.css')}}">
  <link rel="stylesheet" href="{{asset('public/css/sweetalert.css')}}">
  
</head>
</head>
  
<body>
<section class="block-wrapper">
		<div class="container">
			<div class="row">
				
				<div class="error-page text-center">
					<div class="error-code">
						<h2><strong>404</strong></h2>
					</div>
					<div class="error-message">
						<h3>Oops... Page Not Found!</h3>
					</div>
					<div class="error-body">
						Try using the button below to go to main page of the site <br>
						<a href="{{url('/')}}" class="btn btn-primary">Back to Home Page</a>
					</div>
				</div>

			</div><!-- Row end -->


		</div><!-- Container end -->
	</section>


  <script type="text/javascript" src="{{asset('public/assets/js/jquery.js')}}"></script>
  
  <!-- Bootstrap jQuery -->
  <script type="text/javascript" src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
  
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.1/bootstrap3-typeahead.min.js"></script>
  <!-- Owl Carousel -->
  <script type="text/javascript" src="{{asset('public/assets/js/owl.carousel.min.js')}}"></script>
  <!-- Counter -->
  <script type="text/javascript" src="{{asset('public/assets/js/jquery.counterup.min.js')}}"></script>
  <!-- Waypoints -->
  <script type="text/javascript" src="{{asset('public/assets/js/waypoints.min.js')}}"></script>
  <!-- Color box -->
  <script type="text/javascript" src="{{asset('public/assets/js/jquery.colorbox.js')}}"></script>
  <!-- Smoothscroll -->
  <script type="text/javascript" src="{{asset('public/assets/js/smoothscroll.js')}}"></script>
  <!-- Template custom -->
  <script type="text/javascript" src="{{asset('public/assets/js/custom.js')}}"></script>

  </div>
  <!-- Body inner end -->
</body>

</html>