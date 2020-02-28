<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{$Gsetting->title}}  @yield('sub-title')</title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    
<link rel="icon" href="{{asset('/images/'.$Gsetting->default_img)}}" type="image/x-icon" />
  <link rel="stylesheet" href="{{asset('/assets/admin/bootstrap/css/bootstrap.min.css')}}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
<link rel="stylesheet" href="{{asset('/assets/admin/dist/css/style.css')}}">
<link rel="stylesheet" href="{{asset('/assets/admin/dist/css/skins/skin-blue.min.css')}}">
</head>

<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="{{url('/')}}"> <img src="{{asset('/images/bpbd.png')}}" style="width: auto;"> </a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
     @if (session('status'))
      <div class="alert alert-success">
          {{ session('status') }}
      </div>
  @endif

  @if (session('message'))
      <div class="alert alert-{{ session('type')}}">
          {{ session('message') }}
      </div>
  @endif
  @if($errors->any())
      @foreach ($errors->all() as $error)

          <div class="alert alert-danger alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {!!  $error !!}
          </div>
      @endforeach
  @endif
  
  
  @yield('content')
    <!-- <form action="../../index2.html" method="post">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> Remember Me
            </label>
          </div>
        </div>
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form> -->
    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<script src="{{asset('/assets/admin/js/jquery-2.2.3.min.js')}}"></script>
<script src="{{asset('/assets/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- <script src="{{asset('/assets/admin/js/icheck.min.js')}}"></script> -->
<script>
  $(function () {
    $('input').iCheck({
       checkboxClass: 'icheckbox_square-blue',
       radioClass: 'iradio_square-blue',
       increaseArea: '20%' // optional
    });
  });
</script>
  <script type="text/javascript">
  $(".alert").delay(5000).slideUp(300, function() {
       $(this).alert('close');
    });
</script>
</body>
</html>
