@extends('layouts.form')
@section('content')
<h4 class="login-box-msg">New Password </h4>
  <form role="form"  method="POST" action="{{ route('admin.password.request') }}">
    {{ csrf_field() }}
  <input type="hidden" name="token" value="{{ $token }}">

      <div class="form-group  {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{old('email') }}"  data-mask="email" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
      </div>

      <div class="form-group  {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
       <input type="password" name="password" class="form-control" value="" placeholder="New Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
      </div>

      <div class="form-group  {{ $errors->has('password_confirmation') ? ' has-error' : '' }} has-feedback">
        <input type="password" name="password_confirmation" class="form-control" value="" placeholder="Confirm Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        {!! $errors->first('password_confirmation', '<p class="help-block">:message</p>') !!}
      </div>

      <div class="row">        
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Update Password</button>
        </div>
      </div>
    </form>
@stop