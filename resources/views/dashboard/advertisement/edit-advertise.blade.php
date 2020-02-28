@extends('dashboard')

@section('sub-title')
  | Advertisement
@stop


@section('content-title')
	Edit Advertisement

	<a href="{{route('advertise')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('style')
<link href="{{ asset('public/assets/admin/css/bootstrap-fileinput.css') }}" rel="stylesheet">
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(function() {
            new nicEditor({fullPanel : true}).panelInstance('area1');
        });
    </script>
@stop


@section('content')

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
       <div class="box box-info">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
              <div class="box-body">
               <div class="form-body">

                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">



                                <form action="{{route('updateAdvert')}}" method="post" class="form-horizontal" role="form" enctype="multipart/form-data">
                                {{csrf_field()}}

                                <input type="hidden" name="id" value="{{$advert->id}}">
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Advertise Size</strong></label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <select name="advert_size" id="" class="form-control bold input-lg" required>
                                                @if($advert->advert_size == 1)
                                                    <option class="bold" value="1" selected>300X600</option>
                                                    <option class="bold" value="2">300X250</option>
                                                    <option class="bold" value="3">728X90</option>
                                                    <option class="bold" value="4">970X90</option>
                                                    <option class="bold" value="5">970X250</option>
                                                @elseif($advert->advert_size == 2)
                                                    <option class="bold" value="1">300X600</option>
                                                    <option class="bold" value="2" selected>300X250</option>
                                                    <option class="bold" value="3">728X90</option>
                                                    <option class="bold" value="4">970X90</option>
                                                    <option class="bold" value="5">970X250</option>
                                                @elseif($advert->advert_size == 3)
                                                    <option class="bold" value="1">300X600</option>
                                                    <option class="bold" value="2">300X250</option>
                                                    <option class="bold" value="3" selected>728X90</option>
                                                    <option class="bold" value="4">970X90</option>
                                                    <option class="bold" value="5">970X250</option>
                                                @elseif($advert->advert_size == 4)
                                                    <option class="bold" value="1">300X600</option>
                                                    <option class="bold" value="2">300X250</option>
                                                    <option class="bold" value="3">728X90</option>
                                                    <option class="bold" value="4" selected>970X90</option>
                                                    <option class="bold" value="5">970X250</option>
                                                @elseif($advert->advert_size == 5)
                                                    <option class="bold" value="1">300X600</option>
                                                    <option class="bold" value="2">300X250</option>
                                                    <option class="bold" value="3">728X90</option>
                                                    <option class="bold" value="4">970X90</option>
                                                    <option class="bold" value="5" selected>970X250</option>
                                                @endif
                                            </select>
                                            <span class="input-group-addon"><strong><i class="fa fa-list"></i></strong></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Advertise Title</strong></label>
                                    <div class="col-md-12">
                                        <div class="input-group">
                                            <input class="form-control bold input-lg" name="title" value="{{ $advert->title }}" type="text" placeholder="Advertisement Title" required>
                                            <span class="input-group-addon"><strong><i class="fa fa-file-text-o"></i></strong></span>
                                        </div>
                                    </div>
                                </div>
                                @if($advert->advert_type == 1)
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Advertise Link</strong></label>
                                        <div class="col-md-12">
                                            <div class="input-group">
                                                <input class="form-control bold input-lg" name="link" value="{{ $advert->link }}" type="text" placeholder="Advertisement Link" required>
                                                <span class="input-group-addon"><strong><i class="fa fa-bolt"></i></strong></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Advertise Image</strong></label>
                                        <div class="col-md-12">
                                            <img src="{{ asset('public/images') }}/{{ $advert->val1 }}" alt="" style="min-width: 60%; max-height: 180px;">
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">Change Advertise Image</strong></label>
                                    <div class="col-md-12">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="input-group input-large">
                                                <div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
                                                    <i class="fa fa-file fileinput-exists"></i>&nbsp;
                                                    <span class="fileinput-filename"> </span>
                                                </div>
                                                <span class="input-group-addon btn default btn-file">
                                                                    <span class="fileinput-new bold uppercase"> <i class="fa fa-picture-o"></i> Select image </span>
                                                                    <span class="fileinput-exists bold uppercase"> Change </span>
                                                                    <input type="file" name="val1"> </span>
                                                <a href="javascript:;" class="input-group-addon btn red fileinput-exists bold uppercase" data-dismiss="fileinput"> Remove </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    <div class="form-group">
                                        <label class="col-md-12"><strong style="text-transform: uppercase;">Advertise Code</strong></label>
                                        <div class="col-md-12">
                                            <textarea name="val2" id="" cols="30" rows="8" class="bold form-control input-lg" required placeholder="Advertise Code">{{ $advert->val2 }}</textarea>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label class="col-md-12"><strong style="text-transform: uppercase;">STATUS</strong></label>
                                    <div class="col-md-12">
                                        <input data-toggle="toggle" {{ $advert->status == 1 ? 'checked' : ''}} data-onstyle="success" data-size="large" data-offstyle="danger" data-on="Active" data-off="Deactive" data-width="100%" type="checkbox" name="status">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" onclick="nicEditors.findEditor('area1').saveContent();" class="btn blue btn-block btn-lg bold"><i class="fa fa-send"></i> UPDATE ADVERT</button>
                                    </div>
                                </div>
                                </form>

                            </div>
                        </div>
                    </div>


                            
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                
              </div>
          </div>
         
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
@stop


@section('script')
<script src="{{asset('public/assets/admin/js/bootstrap-toggle.min.js')}}"></script>
<script src="{{ asset('public/assets/admin/js/bootstrap-fileinput.js') }}"></script>
@stop