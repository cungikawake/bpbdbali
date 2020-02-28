@extends('layouts.form')

@section('content')
  <h4 class="login-box-msg">Reset Password </h4>
    <form method="POST" role="form" action="{{ route('admin.password.email') }}">
    {{ csrf_field() }}
      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" data-mask="email" required>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
      </div>

      <div class="row">        
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Send Code</button>
        </div>
      </div>
    </form>
@stop