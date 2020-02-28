@extends('dashboard')
@section('sub-title')
  | Staff
@stop

@section('content-title')
	Edit Staff

	<a href="{{route('staffs')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
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
            <form class="form-horizontal" name="editStaff" action="{{route('updatestaffs')}}" method="post">
            {{ csrf_field() }}
              <div class="box-body">
               <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">First Name *</label>
                  <div class="col-sm-8">
                    <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}">
                  </div>
                </div>

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Last Name *</label>
                  <div class="col-sm-8">
                    <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Staff Email *</label>
                  <div class="col-sm-8">
                    <input type="email" value="{{$user->email}}" name="email" class="form-control">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Staff Phone *</label>
                  <div class="col-sm-8">
                    <input type="tel"  name="phone" value="{{$user->phone}}" class="form-control">
                  </div>
                </div>
                    
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Update  </button>
              </div>
              <!-- /.box-footer -->
            </form>



        <br>
        <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
            <form action="{{route('updateRole')}}" method="post" role="form" class="form-horizontal" >
            {{csrf_field()}}
              <legend>Role Field</legend>
                <input type="hidden" name="id" value="{{$user->id}}">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Select Role *</label>
                  <div class="col-sm-8">
                    <select name="role" class="form-control" required>
                    <option value="">Select Role</option>
                    @foreach($roles as $role)
                      <option value="{{$role->id}}">{{$role->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
          </div>
          <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Update Role  </button>
              </div>
          </div>
          </form>



        <br>
        <div class="box box-info">
            <div class="box-header with-border">
            </div>
            <div class="box-body">
            <form action="{{route('updatePass')}}" method="post" role="form" class="form-horizontal">
            {{csrf_field()}}
              <legend>Password Field</legend>
            
            <input type="hidden" name="id" value="{{$user->id}}">
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
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Change Password  </button>
              </div>
          </div>

            </form>
         
	</div>
	<!-- /.col -->
</div>
<script type="text/javascript">
  // document.forms['editStaff'].elements['role'].value={{$role->id}}
</script>
<!-- /.row -->
@stop


@section('script')

@stop