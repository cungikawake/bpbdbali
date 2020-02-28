<!DOCTYPE html>
<html lang="">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Title Page</title>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->
	</head>
	<body>
	<div class="container">
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
			<br><br>
			<div class="panel panel-default">
				<div class="panel-heading">
				<h1 class="text-center">Reset Password</h1>
					@if (Session::get('error'))
					  <div class="alert alert-error">
					    	<p>{{ Session::get('error') }}</p>
					  </div>
					@endif
				</div>

				<div class="panel-body">
					<form class="form-horizontal" id="bootstrapTagsInputForm" action="{{route('reset.password.complete')}}" method="post">
				{{csrf_field()}}
				<div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Old Password *</label>
                  <div class="col-sm-8">
                    <input type="text" name="old_password" class="form-control" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Password *</label>
                  <div class="col-sm-8">
                    <input type="text" name="password" class="form-control" value="">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password *</label>
                  <div class="col-sm-8">
                    <input type="password"  name="password_confirmation" class="form-control" value="">
                  </div>
                </div>
                <div class="form-group">
	                <div class="col-sm-8 col-md-offset-3">
						<button type="submit" class="btn btn-primary btn-block">Submit</button>
					</div>
				</div>
				</form>	
				</div>
			</div>
		</div>
	</div>
</div>

		<!-- jQuery -->
		<script src="//code.jquery.com/jquery.js"></script>
		<!-- Bootstrap JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
		<!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
 		<script src="Hello World"></script>
	</body>
</html>