@extends('dashboard')

@section('sub-title')
 | Popup Infos
@stop

@section('content-title')
    Popup Infos

	<a href="{{route('popup_infos.create')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add</b> </a>
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
                            <th data-field="Category" data-sortable="true">Url</th>
                            <th data-field="Details" data-sortable="true">Image</th>
                            <th data-sortable="true">Start</th>
                            <th data-sortable="true">Finish</th>
                            <th data-sortable="true">Status</th>
                            <th data-field="Actions" width="30%">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($datas as $data)
                        <tr>
                        	<td class="text-center"></td>
                            <td>{{$data->title}}</td>
                            <td>{{$data->url}}</td>
                            <td><img src='{{ asset("uploads/popup_infos/$data->image") }}' width="100px" ></td>
                            <td>{{$data->start}}</td>
                            <td>{{$data->finish}}</td>
                            <td>{{$data->displayStatus()}}</td>
                            <td>
                            	<a class="btn btn-primary btn-xs" href="{{route('popup_infos.edit',['id'=> $data->id])}}">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                                </a>
                                <a class="btn btn-danger btn-xs" href="{{route('popup_infos.destroy', ['id'=> $data->id])}}" onclick="return checkDelete()">
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