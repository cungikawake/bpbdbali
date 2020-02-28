@extends('dashboard')

@section('sub-title')
|  Profile-Settings
@stop


@section('content-title')
	Profile-Settings

@stop

@section('style')

<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
@stop

@section('content')

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
        
       <div class="box box-info">
            <div class="box-header with-border">
              
              @if (Session::get('error'))
                <div class="alert alert-error">
                  {{ Session::get('error') }}
                </div>
              @endif
            </div>
            <!-- /.box-header -->
            <form class="form-horizontal" action="{{route('updateProfile')}}" method="post">
            {{ csrf_field() }}
              <div class="box-body">
            <legend> Update Information </legend>

               <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">First Name :</label>
                  <div class="col-sm-8">
                    <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Last Name :</label>
                  <div class="col-sm-8">
                    <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Email :</label>
                  <div class="col-sm-8">
                    <input type="email" value="{{$user->email}}" name="email" class="form-control" readonly disabled>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Phone :</label>
                  <div class="col-sm-8">
                    <input type="tel"  name="phone" value="{{$user->phone}}" class="form-control">
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Update  </button>
                </form>
              </div>
              <!-- /.box-footer -->
            


        <br><br>
        <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
            <form action="{{route('profile')}}" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
            {{csrf_field()}}
              <legend>Profile </legend>
            
            <input type="hidden" name="id" value="{{$user->id}}">

            <div class="form-group">
                  <div class="col-sm-4 col-sm-offset-5">
                  @if(!$user->profile)
                    <img src="{{asset('public/assets/admin/dist/img/pro.png')}}" class="img-circle" alt="User Image"><br>
                    @else
                    <img src="{{asset('public/images/'.$user->profile)}}" class="img-circle" alt="User Image"><br>
                    @endif
                  </div>
            </div>
              <div class="form-group">
                  <div class="col-sm-8 col-sm-offset-3">
                    <div class="fileinput fileinput-new" data-provides="fileinput">
                      <div class="input-group input-large">
                        <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                          <i class="fa fa-file fileinput-exists"></i>&nbsp;
                          <span class="fileinput-filename"> </span>
                      </div>
                      <span class="input-group-addon btn default btn-file">
                      <span class="fileinput-new bold uppercase">
                       <i class="fa fa-picture-o"></i> Select image </span>
                       <span class="fileinput-exists bold uppercase"> Change </span>
                       <input type="file" name="profile" > </span>
                       <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput">Remove</a>
                        </div>
                    </div>
                  </div>
                </div>
          </div>
          <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Upload  </button>
              </div>
            </form>
          </div>
        <br>


        <br>
        <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
            <form action="{{route('updatePass')}}" method="post" role="form" class="form-horizontal">
            {{csrf_field()}}
              <legend>Change Password </legend>
            
            <input type="hidden" name="id" value="{{$user->id}}">

              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Old Password </label>
                  <div class="col-sm-8">
                    <input type="text" name="old_password" class="form-control" >
                  </div>
                </div>
              <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Password *</label>
                  <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" >
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password *</label>
                  <div class="col-sm-8">
                    <input type="password"  name="password_confirmation" class="form-control" >
                  </div>
                </div>
              
          </div>
          <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Update Password </button>
              </div>
            </form>
          </div>

         
  </div>
  <!-- /.col -->
</div>
@stop


@section('script')
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop