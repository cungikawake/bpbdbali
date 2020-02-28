@extends('dashboard')

@section('sub-title')
 | Gallery
@stop

@section('content-title')
    Gallery

	<a href="{{route('gallery.create')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add</b> </a>
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
                            <th data-field="title" data-sortable="true" >Title</th>
                            <th data-field="Details" data-sortable="true">Image</th>
                            <th data-sortable="true">Status</th>
                            <th data-field="Actions" width="30%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                        <tr>
                        	<td class="text-center"></td>
                            <td>{{$data->title}}</td>
                            <td><img src='{{ asset("uploads/gallery/$data->image") }}' width="100px" ></td>
                            <td>{{$data->displayStatus()}}</td>
                            <td>
                            	<a class="btn btn-primary btn-xs" href="{{route('gallery.edit',['id'=> $data->id])}}">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                                </a>
                                <a class="btn btn-danger btn-xs" href="{{route('gallery.destroy', ['id'=> $data->id])}}" onclick="return checkDelete()">
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


@section('scripts')

@stop