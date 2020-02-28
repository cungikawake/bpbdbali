@extends('dashboard')

@section('sub-title')
 | Category
@stop

@section('content-title')
	Add Category

	<a href="{{route('category')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('content')


<script type="text/javascript">
    var xmlhttp = false;
    try {
        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (E) {
            xmlhttp = false;
        }
    }
    if (!xmlhttp && typeof XMLHttpRequest != 'undefined') {
        xmlhttp = new XMLHttpRequest();
    }
    function makerequest(position, objID)
    { 
        var e = document.getElementById("parent_id");
        var parent = e.options[e.selectedIndex].value;

        if(parent == 0){
          parent =  null;
        }

        serverPage = 'ajax_position_check/' + position + '/' + parent;
        xmlhttp.open("GET", serverPage);
        xmlhttp.onreadystatechange = function ()
        {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                // alert(xmlhttp.responseText);
                document.getElementById(objID).innerHTML = xmlhttp.responseText;
                if (xmlhttp.responseText == 'Alreay exists') {
                    document.getElementById('c_buttons').disabled = true;
                }
                // if (xmlhttp.responseText == 'Available') {
                //     document.getElementById('c_buttons').disabled = false;
                // }
            }
        }
        xmlhttp.send(null);
    }
</script>


<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
       <div class="box box-info">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" id="" method="post" action="{{route('saveCat')}}">

            {{csrf_field()}}
              <div class="box-body">
               
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Category  Name *</label>
                  <div class="col-sm-8">
                    <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Category Name / Sub Category" required autofocus>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Parent Category</label>
                  <div class="col-sm-8"> 
                     <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">Tidak Ada</option>
                        @foreach($parents as $parent)
                          <option value="{{ $parent->id }}">{{ $parent->name }}</option>
                        @endforeach
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Nav Menu Position *</label>
                  <div class="col-sm-8">
                    <input type="text" name="position" onblur="makerequest(this.value, 'res');" id="position" class="form-control" placeholder="Nav menu position" required autofocus pattern="\d*" min="0" >

                    <span id="res" style="color: red;"></span>
                  </div>
                </div>
                
              </div>
              <!-- /.box-body -->
      <div class="box-footer">
        <button type="submit" id="c_buttons" class="btn btn-success col-sm-8 col-sm-offset-3" onclick="return val();" >Add Category</button>
      </div>
              <!-- /.box-footer -->
            </form>

            @include('errors.errors')
          </div>
         
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->
@stop


@section('script')

 
@stop