@extends('layouts.form')

@section('content')
    <h4 class="login-box-msg">Sign In </h4>

    <form action="{{route('login')}}" method="post">
    {{ csrf_field() }}
      <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} has-feedback">
        <input type="email" class="form-control" placeholder="Email"  name="email" id="email" value="{{ old('email') }}" required autofocus>
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
      </div>

      <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }} has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        {!! $errors->first('password', '<p class="help-block">:message</p>') !!}
      </div>
      <div class="row">
        <div class="col-xs-8 col-xs-offset-1">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox" name="remember_me"> Remember Me
            </label>
          </div>
        </div>
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
        </div>
      </div>
    </form>
    <a href="{{url('/admin-password/reset')}}">I forgot my password</a><br>

@stop