@extends('dashboard')
@section('sub-title')
 | Category
@stop

@section('content-title')
  Category

  <a href="{{route('addcat')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add Category </b> </a>
@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
              <!-- <h3 class="box-title"></h3> -->
              
            <!-- /.box-header -->
            <div class="box-body">
              
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="sl"  >ID.</th>
                            <th data-field="Name" data-sortable="true" >Category Name</th>
                            <th data-field="Slug" data-sortable="true">Category Slug</th>
                            <th data-field="Perent" data-sortable="true">Sub From ID</th>
                            <th data-field="Position" data-sortable="true"> Position</th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $i=0; ?>
                    @foreach($categories as $cat)
                        <tr>
                          <td class="text-center"></td>
                          <td>{{$cat->id}}</td>
                            <td class="">{{$cat->name}}</td>
                            <td class="">{{$cat->slug}}</td> 
                            <td class="">{{$cat->parent_id}}</td>
                            <td class="">{{$cat->position}}</td>
                            <td class="text-center">
                            <?php if($cat->status == 1) {?>
                              <span class="label label-success">Active</span>
                              <?php } else{ ?>
                              <span class="label label-warning">Deactive</span>
                              <?php }?>
                            </td>
                            <td class="">
                              <a class="btn btn-primary btn-xs" href="{{url('/edit-category/'.$cat->id)}}">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                                </a>
                                <?php if($cat->status == 1) {?>
                                <a class="btn btn-warning btn-xs" href="{{url('/upb-category/'.$cat->id)}}">
                                    <span class="glyphicon glyphicon-remove"></span>  Deactive
                                </a>
                                <?php } else{ ?>
                                <a class="btn btn-success btn-xs" href="{{url('/pb-category/'.$cat->id)}}">
                                    <span class="glyphicon glyphicon-ok"></span>  Active
                                </a>
                                <?php }?>

                                <a class="btn btn-danger btn-xs" href="{{url('/delete-category/'.$cat->id)}}" onclick="return checkDelete()">
                                    <span class="glyphicon glyphicon-trash"></span>  Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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


@stop

