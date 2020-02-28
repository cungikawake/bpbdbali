@extends('dashboard')
@section('sub-title')
 | Video
@stop

@section('content-title')
Videos
  <a href="{{route('addvideos')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add Videos </b> </a>
@stop

@section('content')

<div class="row">
    <div class="col-xs-12">
        
       
          <div class="box">
            <div class="box-header">
              
            </div>
            <div class="box-body">
              
                <table data-toggle="table"   data-show-refresh="true" data-show-toggle="true" data-show-columns="true" data-search="true" data-select-item-name="toolbar1" data-pagination="true" data-sort-name="name" data-sort-order="desc">
                    <thead>
                        <tr>
                            <th data-field="id" data-checkbox="true" ></th>
                            <th data-field="Video" data-sortable="true" >Video</th>
                            <th data-field="Title" data-sortable="true" >Video Title</th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($videos as $video)
                        <tr>
                          <td class="text-center"></td>
                            <td class="">
                              <div class="videoWrapper">
                                  {!!$video->url!!}
                              </div>
                            </td>
                         <td class=""><p>{{$video->title}}</p></td>
                            <td class="">
                              <?php if($video->status == 1) {?>
                              <span class="label label-success">Active</span>
                              <?php } else{ ?>
                              <span class="label label-warning">Deactive</span>
                              <?php }?>
                            </td>
                            </td>
                            <td class="">
                              <a class="btn btn-primary btn-xs" href="{{url('/edit-videos/'.$video->id)}}">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                                </a>
                                
                                <?php if($video->status == 1) {?>
                                <a class="btn btn-warning btn-xs" href="{{url('/upb-videos/'.$video->id)}}">
                                    <span class="glyphicon glyphicon-remove"></span> Deactive 
                                </a>
                                <?php } else{ ?>
                                <a class="btn btn-success btn-xs" href="{{url('/pb-videos/'.$video->id)}}">
                                    <span class="glyphicon glyphicon-ok"></span>  Active
                                </a>
                                <?php }?>

                                <a class="btn btn-danger btn-xs" href="{{url('/delete-videos/'.$video->id)}}" onclick="return checkDelete()">
                                    <span class="glyphicon glyphicon-trash"></span>  Delete
                                </a>
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

