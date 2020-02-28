@extends('layouts.form')

@section('content')

  <h4 class="login-box-msg">Sign Up </h4>
    <form action="{{route('register')}}" method="post">
    {{ csrf_field() }}

      <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }} has-feedback">
        <input type="text" class="form-control" placeholder="First Name"  name="first_name" id="first_name" value="{{ old('first_name') }}" required autofocus>
        {!! $errors->first('first_name', '<p class="help-block">:message</p>') !!}
      </div>

      <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }} has-feedback">
        <input type="text" class="form-control" placeholder="Last Name"  name="last_name" id="last_name" value="{{ old('last_name') }}" required autofocus>
        {!! $errors->first('last_name', '<p class="help-block">:message</p>') !!}
      </div>


      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input type="email" class="form-control" placeholder="Email"  name="email" id="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
      </div>

      <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password-confirm" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>

      <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign Up</button>
        </div>
      </div>
    </form>
    <br>
    <div class="row">
        <div class="col-xs-12">
          <a href="{{url('/login')}}" class="btn btn-success btn-block btn-flat">Sign In</a>
        </div>
      </div>
@stop