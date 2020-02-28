@extends('dashboard')
@section('sub-title')
  | Staff
@stop

@section('content-title')
	Add Staff

	<a href="{{route('staffs')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('content')

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
       <div class="box box-info">
            <div class="box-header with-border">

            @include('errors.errors')
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" name="staffrm" action="{{route('savestaffs')}}" method="post">
            {{ csrf_field() }}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">First Name *</label>
                  <div class="col-sm-8">
                    <input type="text" name="first_name" class="form-control"  placeholder="First Name"  autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Last Name *</label>
                  <div class="col-sm-8">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name"  autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Email *</label>
                  <div class="col-sm-8">
                    <input type="email" name="email" id="email" class="form-control"  placeholder="Email " onblur="makerequest(this.value, 'res');">
                  </div>
                  <span id="res" style="color: red;"></span>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label"> Phone *</label>
                  <div class="col-sm-8">
                    <input type="tel" name="phone" class="form-control"  placeholder="Phone" />
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Password *</label>
                  <div class="col-sm-8">
                    <input type="password" name="password" class="form-control" placeholder="password"  autofocus>
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Confirm Password *</label>
                  <div class="col-sm-8">
                    <input type="password"  name="password_confirmation" class="form-control" placeholder="password confirmation"  autofocus>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Select Role *</label>
                  <div class="col-sm-8">
                    <select name="role" id="inputRoel" class="form-control" required>
                    <option>Select Role</option>
                    @foreach($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                    
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" id="c_buttons" onclick="return val();" class="btn btn-success col-sm-8 col-sm-offset-3">Add  </button>
              </div>
              <!-- /.box-footer -->
            </form>

          </div>
         
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->


@stop


@section('script')

@stop