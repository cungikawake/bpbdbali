@extends('dashboard')

@section('sub-title')
 | Advertisement
@stop


@section('content-title')
Advertisement
  <a href="{{route('addAdvertise')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add Advertisement </b> </a>
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
                            <th data-field="sl" data-sortable="true" >SL.</th>
                            <th data-field="add_type" data-sortable="true" >Advertisement Type</th>
                            <th data-field="add_size" data-sortable="true">Advertisement Size </th>
                            
                            <th data-field="View" data-sortable="true">View </th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($addvert as $key => $v)
                        <tr>
                          <td class="text-center"></td>
                          <td>{{++$key}}</td>
                          @if($v->advert_type == 1)
                          <td> Own Advertisement</td>
                          @else
                          <td> Google Advertisement</td>
                          @endif
                          <td>
                              @if($v->advert_size == 1)
                                  <span class="label label-primary ">300 X 600</span>
                              @elseif($v->advert_size == 2)
                                  <span class="label label-primary ">300 X 260</span>
                              @elseif($v->advert_size == 3)
                                  <span class="label label-primary "> 728 X 90</span>
                              @elseif($v->advert_size == 4)
                                  <span class="label label-primary "> 970 X 90</span>
                              @elseif($v->advert_size == 5)
                                  <span class="label label-primary "> 970 X 250</span>
                              @endif
                          </td>
                         <td><label class="label label-info">{{$v->hit}}</label></td>
                            <td>
                              @if($v->status == 1)
                              <span class="label label-success">Active</span>
                              @else
                              <span class="label label-warning">Deactive</span>
                              @endif
                            </td>
                            <td class="">
                              <a class="btn btn-primary btn-xs" href="{{route('editAdvertise', $v->id)}}">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                                </a>
                                <a class="btn btn-danger btn-xs" href="{{url('/del-advertise/'.$v->id)}}" onclick="return checkDelete();">
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

