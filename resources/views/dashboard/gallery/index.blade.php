@extends('dashboard')
@section('sub-title')
 | Image Gallery
@stop

@section('content-title')
Image Gallery
  <a href="{{route('addgallery')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add Gallery </b> </a>
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
                            <th data-field="Name" data-sortable="true" >Gallery Title</th>
                            <th data-field="Slug" data-sortable="true">Total image</th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($imgTitles as $img)
                        <tr>
                          <td class="text-center"></td>
                            <td class="">{{$img->title}}</td>

                         <td class="">{{$img->CountImage->count()}}</td>
                            <td class="">
                              <span class="label label-success">Published</span>
                            </td>
                            <td class="">
                              <a class="btn btn-primary btn-xs" href="{{route('editgallery')}}">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                                </a>
                                <a class="btn btn-warning btn-xs" href="#">
                                    <span class="glyphicon glyphicon-remove"></span>  Hide
                                </a>
                                <a class="btn btn-danger btn-xs" href="{{url('/del-img/'.$img->id)}}" onclick="return checkDelete();">
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

