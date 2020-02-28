@extends('dashboard')

@section('sub-title')
 | News
@stop

@section('content-title')
	News

	<a href="{{route('addnews')}}" type="button" class="pull-right btn  btn-info btn-flat"><i class="fa fa-plus"></i> <b>Add News Post</b> </a>
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
                            <th data-field="title" data-sortable="true" >News Title</th>
                            <th data-field="Category" data-sortable="true">News Category</th>
                            <th data-field="Details" data-sortable="true">News Details</th>
                            <th data-field="Status" data-sortable="true">Status </th>
                            <th data-field="Actions" data-sortable="true">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($allNews as $news)
                        <tr>
                        	<td class="text-center"></td>
                            <td class="">{{$news->title}}</td>
                         <td class=""> 
                            <?php
                              $d =  explode(',', $news->category_id); 
                            ?>

                            @foreach($category as $c)
                                @foreach($d as $cate)
                                    <b>@if($cate == $c->id) {{$c->name}}  @endif</b>
        
                                @endforeach
                            @endforeach

                            
                         </td>
                            <td class="">{!! str_limit(strip_tags($news->details),80) !!}</td>
                            <td class="">
                            <?php if($news->status == 1) {?>
                            	<span class="label label-success">Published</span>
                                <?php } else { ?>
                                <span class="label label-warning">Unpublished</span>
                                <?php }?>
                            </td>
                            <td class="">
                            	<a class="btn btn-primary btn-xs" href="{{url('/edit-news/'.$news->id)}}">
                                    <span class="glyphicon glyphicon-edit"></span>  Edit
                                </a>
                                <?php if($news->status == 1) {?>
                                <a class="btn btn-warning btn-xs" href="{{url('/upb-news/'.$news->id)}}">
                                    <span class="glyphicon glyphicon-remove"></span>  Hide
                                </a>
                                <?php } else{ ?>
                                <a class="btn btn-success btn-xs" href="{{url('/pb-news/'.$news->id)}}">
                                    <span class="glyphicon glyphicon-ok"></span>  Show
                                </a>
                                <?php }?>
                                <a class="btn btn-danger btn-xs" href="{{url('/delete-news/'.$news->id)}}" onclick="return checkDelete()">
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