@extends('dashboard')

@section('sub-title')
 | Socail Setting
@endsection

@section('content-title')
Social
  
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12 ">
        <div class="box">
            <div class="box-header"></div>
            <!-- /.box-header -->
            <div class="box-body">
                 <div class="caption">
                <button id="btn_add" name="btn_add" class="btn btn-primary pull-right bold"><i class="fa fa-plus"></i> Add New Social</button></div><br>
                 
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>SL.</th>
                            <th>Name</th>
                            <th>Icon</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody id="products-list" name="products-list">
                        @foreach ($social as $k => $product)
                            <tr id="product{{$product->id}}">
                                <td>{{++$k}}</td>
                                <td>{{$product->name}}</td>
                                <td style="font-size: 22px;">{!! $product->code !!}</td>
                                <td>{{$product->link}}</td>
                                <td>
                                    @if($product->status == 1)
                                    <label class="label label-success">Active</label>
                                    @else
                                    <label class="label label-warning">Deactive</label>
                                    @endif
                                </td>
                                <td>
                                    <button class="btn btn-primary btn-detail open_modal " value="{{$product->id}}"><i class="fa fa-edit"></i> EDIT</button>
                                    <button type="button" class="btn btn-danger delete_button" data-toggle="modal" data-target="#DelModal" data-id="{{$product->id}}"> <i class='fa fa-trash'></i> DELETE</button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
      <!-- /.col -->
    </div>
</div>
<!-- /.row -->



      
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <h4 class="modal-title" id="myModalLabel"><i class="fa fa-share-square"></i> Manage Social</h4>
                </div>
                <div class="modal-body">
                    <form id="frmProducts" name="frmProducts" class="form-horizontal" novalidate="">
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label bold uppercase">Name : </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error bold " id="name" name="name" placeholder="Social Name" value="">
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label bold uppercase">Icon Code : </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error bold " id="code" name="code" placeholder="Social Fontawesome Code" value="">
                                <code>For Fontawesome code visit : http://fontawesome.io/icons/</code>
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label bold uppercase">Link : </label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control has-error bold " id="link" name="link" placeholder="Social Link" value="">
                            </div>
                        </div>
                        <div class="form-group error">
                            <label for="inputName" class="col-sm-3 control-label bold uppercase">Status : </label>
                            <div class="col-sm-9">
                            <select name="status" id="status" class="form-control has-error" >
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
                                </select>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary bold uppercase" id="btn-save" value="add"><i class="fa fa-send"></i> Save Social</button>
                    <input type="hidden" id="product_id" name="product_id" value="0">
                </div>
            </div>
        </div>
    </div>
    <meta name="_token" content="{!! csrf_token() !!}" />
    <!-- Modal for DELETE -->
    <div class="modal fade" id="DelModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel"> <i class='fa fa-trash'></i> Delete !</h4>
                </div>

                <div class="modal-body">
                    <strong>Are you sure you want to Delete ?</strong>
                </div>

                <div class="modal-footer">
                    <form method="post" class="form-inline">
                        <input type="hidden" name="delete_id" id="delete_id" class="delete_id" value="0">
                        <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                        <button type="button" class="btn btn-danger deleteButton"><i class="fa fa-trash"></i> DELETE</button>
                    </form>
                </div>

            </div>
            </div>
            </div>
        

  
@endsection

@section('script')


    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on("click", '.delete_button', function (e) {
                var id = $(this).data('id');
                $("#delete_id").val(id);
            });
        });
        var url = '{{ url('/social-settings') }}';
        //display modal form for product editing
        $(document).on('click','.open_modal',function(){
            var product_id = $(this).val();

            $.get(url + '/' + product_id, function (data) {
                //success data
                console.log(data);
                $('#product_id').val(data.id);
                $('#name').val(data.name);
                $('#code').val(data.code);
                $('#link').val(data.link);
                $('#status').val(data.status);
                $('#btn-save').val("update");
                $('#myModal').modal('show');
            })
        });
        //display modal form for creating new product
        $('#btn_add').click(function(){
            $('#btn-save').val("add");
            $('#frmProducts').trigger("reset");
            $('#myModal').modal('show');
        });
        //create new product / update existing product
        $("#btn-save").click(function (e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            })
            e.preventDefault();
            var formData = {
                name: $('#name').val(),
                code: $('#code').val(),
                link: $('#link').val(),
                status: $('#status').val(),
            }

            //used to determine the http verb to use [add=POST], [update=PUT]
            var state = $('#btn-save').val();
            var type = "POST"; //for creating new resource
            var product_id = $('#product_id').val();;
            var my_url = url;
            if (state == "update"){
                type = "PUT"; //for updating existing resource
                my_url += '/' + product_id;
            }
            console.log(formData);
            $.ajax({
                type: type,
                url: my_url,
                data: formData,
                dataType: 'json',
                success: function (data) {
                    console.log(data);

                    var product = '<tr id="product' + data.id + '"><td>' + data.id + '</td><td>' + data.name + '</td><td style="font-size: 22px;">' + data.code + '</td><td>' + data.link + '</td><td>'+ '<label class="label label-'+(data.status == 1 ? 'success' :'warning')+ '">' +(data.status == 1 ? 'Active' :'Deactive') +'</label></td>';

                    product += '<td><button class="btn btn-primary btn-detail open_modal" value="' + data.id + '"><i class="fa fa-edit"></i> EDIT</button>';
                    product += '<button type="button" class="btn btn-danger delete_button" data-toggle="modal" data-target="#DelModal" data-id='+ data.id +'> <i class="fa fa-trash"></i> DELETE</button></td></tr>';

                    if (state == "add"){ //if user added a new record
                        $('#products-list').append(product);
                    }else{ //if user updated an existing record
                        $("#product" + product_id).replaceWith( product );
                    }
                    $('#frmProducts').trigger("reset");
                    $('#myModal').modal('hide')
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            }).done(function() {
                swal({
                        title: "Good Job",
                        text: "Successfully Saved !!",
                        type: "success",
                        showConfirmButton: false,
                        timer: 2000,
                    });
            });
        });

        //delete product and remove it from list
        $(document).ready(function () {
            $(document).on('click','.deleteButton',function(e){

                var product_id = document.getElementById("delete_id").value;

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                })
                $.ajax({
                    type: "DELETE",
                    url: url + '/' + product_id,
                    success: function (data) {
                        $('#DelModal').modal('hide');
                        $("#product" + product_id).remove();
                    },
                    error: function (data) {
                        console.log('Error:', data);
                    }
                }).done(function() {
                    swal({
                        title: "Good Job",
                        text: "Successfully Deleted !!",
                        type: "success",
                        showConfirmButton: false,
                        timer: 2000,
                    });
                });

            });
        });
    </script>


@endsection

