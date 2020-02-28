@extends('dashboard')

@section('sub-title')
 | Settings
@stop

@section('content-title')
General Settings
  
@stop

@section('style')
<link rel="stylesheet" href="{{asset('/assets/admin/bootstrap/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@stop
@section('content')

<div class="row">
    <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                
            </div>
              
            <!-- /.box-header -->
            <div class="box-body">
              
                <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#Logo" aria-controls="home" role="tab" data-toggle="tab">Logo</a>
                        </li>

                        <li role="presentation">
                            <a href="#Default" aria-controls="profile" role="tab" data-toggle="tab">favico icon</a>
                        </li>
                        <li role="presentation">
                            <a href="#Contents" aria-controls="messages" role="tab" data-toggle="tab">Website Contents</a>
                        </li>
                        <li role="presentation">
                            <a href="#About" aria-controls="settings" role="tab" data-toggle="tab">About Us</a>
                        </li>
                        <li role="presentation">
                          <a href="#Address" aria-controls="settings" role="tab" data-toggle="tab">Office Address</a>
                        </li>
                        <li role="presentation">
                            <a href="#Foorter" aria-controls="settings" role="tab" data-toggle="tab">Foorter</a>
                        </li>

                      </ul>


                      <!-- Tab panes -->
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="Logo">

                          <div class="box-body">
                              <form action="{{route('logo')}}" method="post" enctype="multipart/form-data" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend>Website Logo</legend>
                                   <input type="hidden" name="id" value="{{$Gsetting->id}}">
                              
                            <div class="form-group">
                                <label for="inputEmail3" class="col-sm-3 control-label"> </label>
                              @if($Gsetting->logo == null)
                              <h5 style="color: red;">there is no logo</h5>
                              @else
                              <img src="{{asset('/images/'.$Gsetting->logo)}}" height="70px" width="150px">
                              @endif
                            </div><br>

                            <div class="form-group">
                              <label for="inputEmail3" class="col-sm-3 control-label">Setup New Logo *</label>
                              
                              <div class="col-sm-6">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="input-group input-large">
                                      <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                      <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                      <span class="fileinput-filename"> </span>
                                    </div>
                                  <span class="input-group-addon btn default btn-file">
                      <span class="fileinput-new bold uppercase"> <i class="fa fa-picture-o"></i> Select image </span>
                      <span class="fileinput-exists bold uppercase"> Change </span>
                    <input type="file" name="logo" value="{{$Gsetting->logo}}" > </span>
                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput"> Remove </a>
                            </div>
                            </div>
                            </div>

                            </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                            <button type="submit" class="btn btn-success col-sm-6 col-sm-offset-3">Upload Logo</button>
                          </div>
                        </form>
                      </div>

                        <div role="tabpanel" class="tab-pane" id="Default">
                          <div class="box-body">
                              <form action="{{route('defaultImg')}}" method="POST" role="form" class="form-horizontal" enctype="multipart/form-data">
                              {{csrf_field()}}
                                <legend>favico icon</legend>
                                   <input type="hidden" name="id" value="{{$Gsetting->id}}">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label"></label>
                                  @if($Gsetting->default_img == null)
                                  <h5 style="color: red;" class="col-sm-offset-4">there is no default image</h5>
                                  @else
                                  <img src="{{asset('/images/'.$Gsetting->default_img)}}" >
                                  @endif
                                </div><br>

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">
                                   Choose new </label>
                                  
                            <div class="col-sm-6">
                              <div class="fileinput fileinput-new" data-provides="fileinput">
                                  <div class="input-group input-large">
                                      <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                      <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                      <span class="fileinput-filename"> </span>
                                    </div>
                                  <span class="input-group-addon btn default btn-file">
                      <span class="fileinput-new bold uppercase"> <i class="fa fa-picture-o"></i> Select image </span>
                      <span class="fileinput-exists bold uppercase"> Change </span>
                    <input type="file" name="default_img" value="{{$Gsetting->default_img}}" > </span>
                    <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput"> Remove </a>
                            </div>
                            </div>
                            </div>

                            </div>

                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                                <button type="submit" class="btn btn-success col-sm-6 col-sm-offset-3">Upload </button>
                              </div>
                            </form>
                          </div>
                        


                        <div role="tabpanel" class="tab-pane" id="Contents">
                            <div class="box-body">
                              <form action="{{route('content')}}" method="POST" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend>Website Content</legend>
                                <input type="hidden" name="id" value="{{$Gsetting->id}}">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">
                                  website Title*</label>
                                  <div class="col-sm-7">
                                    <input type="text" name="title" value="{{$Gsetting->title}}"  class="form-control">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">
                                  Popular Tags *</label>
                                  <div class="col-sm-7">
                                      <input type="text" name="populartag" value="{{$Gsetting->populartag}}" data-role="tagsinput" />
                                  </div>
                                </div>
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                                <button type="submit" class="btn btn-success col-sm-7 col-sm-offset-3">Update</button>
                              </div>
                            </form>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="About">
                              <div class="box-body">
                              <form action="{{route('about')}}" method="POST" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend>About Us</legend>
                              <input type="hidden" name="id" value="{{$Gsetting->id}}">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">
                                  About Us Text *</label>
                                  <div class="col-sm-8">
                                    <textarea name="about" class="textarea"  style="width: 100%; min-height: 250px;">
                                              {{$Gsetting->about}}</textarea>
                                  </div></div>
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                              <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-2">Update</button>
                              </div>
                            </form>
                        </div>

                        <div role="tabpanel" class="tab-pane" id="Address">
                          <div class="box-body">
                              <form action="{{route('address')}}" method="post" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend class="text-center">Office Address </legend> <br>
                                <input type="hidden" name="id" value="{{$Gsetting->id}}">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">
                                  Street Address *</label>
                                  <div class="col-sm-8">
                                    <textarea name="address" id="inputTags" class="textarea"  style="width: 100%; min-height: 250px;">
                                      {{$Gsetting->address}}
                                    </textarea>
                                  </div>
                                </div>
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">
                                  Phone *</label>
                                  <div class="col-sm-8">
                                    <input type="text" name="phone" value="{{$Gsetting->phone}}" class="form-control">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label"> Fax *</label>
                                  <div class="col-sm-8">
                                    <input type="text" name="fax" value="{{$Gsetting->fax}}" class="form-control">
                                  </div>
                                </div>

                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label"> Email *</label>
                                  <div class="col-sm-8">
                                    <input type="email" name="email" value="{{$Gsetting->email}}" class="form-control">
                                  </div>
                                </div>
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                              <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-2">Update</button>
                              </div>
                            </form>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="Foorter">
                          <div class="box-body">
                              <form action="{{route('footer')}}" method="post" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend class="text-center">Website Footer </legend>
                                <input type="hidden" name="id" value="{{$Gsetting->id}}">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">
                                  footer text *</label>
                                  <div class="col-sm-8">
                                      <textarea name="footer" class="textarea" style="width: 100%; min-height: 250px; ">
                                      {{$Gsetting->footer}}</textarea>
                                  </div>
                                </div>
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                              <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-2">Update</button>
                              </div>
                            </form>
                        </div>

                      </div>
                </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->

@stop

@section('script')
<script src="{{ asset('/assets/admin/js/bootstrap-fileinput.js') }}"></script>
<script src="{{asset('/assets/admin/bootstrap/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    $(".textarea").wysihtml5();
  });
</script>

<script>
$(document).ready(function () {
    $('#bootstrapTagsInputForm')
        .find('[name="tags"]')
            // Revalidate the cities field when it is changed
            .change(function (e) {
                $('#bootstrapTagsInputForm').formValidation('revalidateField', 'source');
            })
            .end()
        
        .formValidation({
            framework: 'bootstrap',
            excluded: ':disabled',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                source: {
                    validators: {
                        notEmpty: {
                            message: 'Please enter at least one tag you like the most.'
                        }
                    }
                }
            }
        });
});
</script>
@stop

