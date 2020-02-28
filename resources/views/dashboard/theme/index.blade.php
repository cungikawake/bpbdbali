@extends('dashboard')

@section('sub-title')
 | Theme
@stop

@section('content-title')
Theme
@stop

@section('content')


<div class="row">
    <div class="col-xs-12">
        
       
      <div class="box">
        <div class="box-body">
              <div class="row">
                
                <div class="col-md-6">
                  <div class="x_title"><h3>Default</h3></div>
                  <form action="{{route('themeActive')}}" method="post">
                  {{csrf_field()}}
                    <input type="hidden" id="1" name="status"  value="1">
                      <div class="col-md-12">
                        <img style="max-height: 400px;;max-width: 100%;border:1px solid #ccc;" src="{{asset('/images/theme1.PNG')}}">
                        <div class="text-center">
                        <br>

                          <button type="submit" class="btn btn-success " @if($theme->status == 1)  disabled @endif >Activated</button> 
                        </div>
                      </div>
                    </form>
                </div>
                <div class="col-md-6">
                  <div class="x_title"><h3>Minimal</h3></div>
                  <form action="{{route('themeActive')}}" method="post">
                  {{csrf_field()}}
                    <input type="hidden" id="2" name="status" value="2">
                      <div class="col-md-12">
                        <img style="max-height: 400px;max-width: 100%;border:1px solid #ccc;" src="{{asset('/images/theme2.PNG')}}">
                        <div class="text-center">
                        <br>
                          <button class="btn btn-success " @if($theme->status == 2)  disabled @endif  >Activated</button> 
                        </div>
                      </div>
                      </form>
                </div>
                <div class="col-md-6">
                  <div class="x_title"><h3>Minimal Box</h3></div>
                  <form action="{{route('themeActive')}}" method="post">
                  {{csrf_field()}}
                    <input type="hidden" id="3" name="status" value="3">
                      <div class="col-md-12">
                        <img style="max-width: 100%;border:1px solid #ccc; max-height: 400px;" src="{{asset('/images/theme3.PNG')}}">
                        <div class="text-center">
                        <br>
                          <button class="btn btn-success " @if($theme->status == 3)  disabled @endif  >Activated</button> 
                        </div>
                      </div>
                    </form>
                </div>

                <div class="col-md-6">
                  <div class="x_title"><h3>Fashion</h3></div>
                  <form action="{{route('themeActive')}}" method="post">
                  {{csrf_field()}}
                    <input type="hidden" id="4" name="status" value="4">
                      <div class="col-md-12">
                        <img style="max-width: 100%;border:1px solid #ccc; max-height: 400px;" src="{{asset('/images/theme4.PNG')}}">
                        <div class="text-center">
                        <br>
                          <button class="btn btn-success " @if($theme->status == 4)  disabled @endif  >Activated</button> 
                        </div>
                      </div>
                      </form>
                </div>


              </div>  
        </div>
      </div>
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@stop


@section('script')


@stop

