@extends('dashboard')

@section('sub-title')
 | Seo
@stop

@section('content-title')
SEO Settings
@stop

@section('style')
<link rel="stylesheet" href="{{asset('public/assets/admin/bootstrap/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css')}}">
@stop
@section('content')

<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
                
            </div>
              <!-- <h3 class="box-title"></h3> -->
              
            <!-- /.box-header -->
            <div class="box-body">
              
                      <!-- Nav tabs -->
                      <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                          <a href="#Address" aria-controls="settings" role="tab" data-toggle="tab">Google Analytics</a>
                        </li>
                        <li role="presentation">
                            <a href="#Foorter" aria-controls="settings" role="tab" data-toggle="tab">Website Meta Keywords</a>
                        </li>
                        <li role="presentation">
                            <a href="#comments" aria-controls="settings" role="tab" data-toggle="tab">Facebook Comments</a>
                        </li>
                        <li role="presentation">
                            <a href="#privacy" aria-controls="settings" role="tab" data-toggle="tab">Privacy </a>
                        </li>
                        <li role="presentation">
                            <a href="#sitemap" aria-controls="settings" role="tab" data-toggle="tab"> Site Map</a>
                        </li>
                      </ul>


                      <!-- Tab panes -->
                      <div class="tab-content">

                        <div role="tabpanel" class="tab-pane active" id="Address">
                          <div class="box-body">
                              <form action="{{route('analytics')}}" method="post" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend class="text-center">Google Analytics </legend> <br>
                                <input type="hidden" name="id" value="{{$seo->id}}">
                                <div class="form-group">
                                  <label  class="col-sm-2 control-label">
                                  Google Analytics Script *</label>
                                  <div class="col-sm-8">
                                    <textarea class="" name="analytics" style="width: 100%; min-height: 200px;">{{$seo->analytics}}
                                    </textarea>
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
                              <form action="{{route('meta')}}" method="post" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend class="text-center">Meta Keywords </legend>
                                <input type="hidden" name="id" value="{{$seo->id}}">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">
                                  Website Meta Keywords *</label>
                                  <div class="col-sm-8">
                                          <textarea class="textarea" name="metakeyword" placeholder="Place some text here" style="width: 100%; min-height: 220px;">
                                            {{$seo->metakeyword}}
                                          </textarea>
                                  </div>
                                  </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                              <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-2">Update</button>
                              </div>
                            </form>
                        </div>
                      </div>


                        <div role="tabpanel" class="tab-pane" id="comments">
                          <div class="box-body">
                              <form action="{{route('fbcomment')}}" method="post" role="form" class="form-horizontal">
                              {{csrf_field()}}
                              <legend class="text-center">Fcaebook Comments Script</legend>
                                <input type="hidden" name="id" value="{{$seo->id}}">
                                <div class="form-group">
                                  <label for="inputEmail3" class="col-sm-2 control-label">Script *</label>
                                  <div class="col-sm-8">
                                    <textarea class="form-control" name="fbcomment" style="width: 100%; min-height: 220px;">
                                    {{$seo->fbcomment}}</textarea>
                                  </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Site Name</label>
                                    <div class="col-sm-8">
                                    <input type="text" name="siteurl" value="{{$seo-> siteurl}}" class="form-control" placeholder="example.com/"></div>
                                  </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                              <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-2">Update</button>
                              </div>
                            </form>
                        </div>

                      </div>

                      <div role="tabpanel" class="tab-pane" id="privacy">
                          <div class="box-body">
                              <form action="{{route('privacy')}}" method="post" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend class="text-center">Privacy </legend>
                                <input type="hidden" name="id" value="{{$Gsetting->id}}">
                                <div class="form-group">
                                  <div class="col-sm-10 col-sm-offset-1">
                                          <textarea class="textarea" name="privacy"  style="width: 100%; height: 280px;">
                                            {{$Gsetting->privacy}}
                                          </textarea>
                                  </div>
                                  </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                              <button type="submit" class="btn btn-success col-sm-10 col-sm-offset-1">Update</button>
                              </div>
                            </form>
                        </div>
                      </div>

                      <div role="tabpanel" class="tab-pane" id="sitemap">
                          <div class="box-body">
                              <form action="{{route('sitemap')}}" method="post" role="form" class="form-horizontal">
                              {{csrf_field()}}
                                <legend class="text-center">Site Map </legend>
                                <input type="hidden" name="id" value="{{$Gsetting->id}}">
                                <div class="form-group">
                                  <div class="col-sm-10 col-sm-offset-1">
                                      <textarea class="textarea" name="sitemap" style="width: 100%; height: 280px;">
                                      {{$Gsetting->sitemap}}</textarea>
                                  </div>
                                  </div>
                              <!-- /.box-body -->
                              <div class="box-footer">
                              <button type="submit" class="btn btn-success col-sm-10 col-sm-offset-1">Update</button>
                              </div>
                            </form>
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
<script src="{{asset('public/assets/admin/bootstrap/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js')}}"></script>
<script>
  $(function () {
    $(".textarea").wysihtml5();
  });
</script>

@stop

