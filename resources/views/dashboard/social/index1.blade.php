@extends('dashboard')

@section('content-title')
| Social
  
@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
                @if($msg = Session::get('message'))
                <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <strong>{{$msg}}</strong>
                </div>
                @endif
            </div>
              <!-- <h3 class="box-title"></h3> -->
              
            <!-- /.box-header -->
            <div class="box-body">
              
                <div>
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                          <a href="#Address" aria-controls="settings" role="tab" data-toggle="tab">Social Links</a>
                        </li>
                        <li role="presentation">
                            <a href="#Foorter" aria-controls="settings" role="tab" data-toggle="tab">Facebook Comment</a>
                        </li>
                      </ul>


                      <!-- Tab panes -->
                      <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="Address">
                          <div class="box-body">
                          <legend class="text-center">Social Links</legend> <br>
                                
                              <form action="{{route('socialUpdate')}}" method="post" role="form" class="form-horizontal">
                              {{csrf_field()}}

                              @foreach($socials as $social)
                                <input type="hidden" id="id" name="id[]" value="{{$social->id}}">
                                <div class="form-group">
                                  <label  class="col-sm-3 control-label">
                                  {{$social->name}} *</label>
                                  <div class="col-sm-5">
                                    <input type="text" id="social" name="social[]" value="{{$social->social}}" class="form-control">
                                  </div>


                                  <div class="col-sm-1">
                                  @if($social->status == 1)
                                    <a class="btn btn-success btn-xs" href="{{url('/upb-social/'.$social->id)}}">
                                      <span class="glyphicon glyphicon-ok"></span>  
                                    </a>
                                  @else
                                    <a class="btn btn-warning btn-xs" href="{{url('/pb-social/'.$social->id)}}">
                                      <span class="glyphicon glyphicon-remove"></span>  
                                    </a>
                                  @endif
                                  </div>
                                </div>

                                @endforeach
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                              <button type="submit" class="btn btn-success col-sm-5 col-sm-offset-3">Update</button>
                              </div>
                            </form>
                        </div>


                        <div role="tabpanel" class="tab-pane" id="Foorter">
                          <div class="box-body">
                              <form action="{{route('fbcomment')}}" method="post" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend class="text-center">Facebook Comments </legend>
                                <input type="hidden" name="id" value="{{$seo->id}}">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-3 control-label">
                                  Facebook Comment Scripts *</label>
                                  <div class="col-sm-5">
                                    <div class="box">
                                      <div class="box-header"> </div>
                                      <div class="box-body pad">
                                        <textarea class="textarea" name="fbcomment" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                          {{$seo->fbcomment}}
                                        </textarea>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                              <button type="submit" class="btn btn-success col-sm-5 col-sm-offset-3">Update</button>
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

@section('scripts')
<script type="text/javascript">
$("[name='my-checkbox']").bootstrapSwitch();  
</script>
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

