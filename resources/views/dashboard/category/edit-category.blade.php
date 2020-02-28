@extends('dashboard')

@section('sub-title')
  | Category
@stop

@section('content-title')
	Edit Category

	<a href="{{route('category')}}" type="button" class="pull-right btn  btn-primary btn-flat"><i class="glyphicon glyphicon-arrow-left"></i> <b>Back</b> </a>
@stop

@section('content')

<div class="row">
    <div class="col-xs-10 col-xs-offset-1">
    		
       <div class="box box-info">
            <div class="box-header with-border">
              
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" name="editCategoryForm" method="post" action="{{route('updateCat')}}">
        {{csrf_field()}}
              <div class="box-body">

                <input type="hidden" name="id" value="{{$cat->id}}"/>

                <div class="form-group">
              <label class="col-sm-3 control-label">Category Name *</label>
                  <div class="col-sm-8">
         <input type="text" name="name" class="form-control" value="{{$cat->name}}"/>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-3 control-label">Parent Category</label>
                  <div class="col-sm-8"> 
                     <select class="form-control" name="parent_id" id="parent_id">
                        <option value="0">Tidak Ada</option>
                        @foreach($parents as $parent)
                          <option value="{{$parent->id}}" <?php if($cat->parent_id == $parent->id) echo 'Selected' ;?>>{{ $parent->name }}</option>
                        @endforeach
                     </select>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-3 control-label">Nav Menu Position *</label>
                  <div class="col-sm-8">
                  <input type="text" name="position" value="{{$cat->position}}" pattern="\d*" min="0" class="form-control"/>
                  </div>
                </div>
                
                 <div class="control-group">
                    <label  class="col-sm-3 control-label">Select Status</label>
                    <div class="col-sm-8">
                        <select  name="status"  class="form-control">
                            <option >Select Status</option>
                            <option value="1">Published</option>
                            <option value="0">Unpublished</option>
                        </select>
                      </div>
                    </div>         
               </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-success col-sm-8 col-sm-offset-3">Update Category</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          @include('errors.errors')
         
	</div>
	<!-- /.col -->
</div>
<!-- /.row -->

<script type="text/javascript">
  document.forms['editCategoryForm'].elements['status'].value={{$cat->status}}
</script>
@stop

@section('script')

@stop