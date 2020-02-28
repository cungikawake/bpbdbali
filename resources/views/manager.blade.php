@include('dashboard.includes.header')


  <!-- Left side column. contains the logo and sidebar -->
  @yield('menubar')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        @yield('content-title')
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      @yield('content')


      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">
            @yield('leftcontent')

        </section>
        <!-- /.Left col -->

        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">
            @yield('rightcontent')
        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  

 
  
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.3.8
    </div>
    <strong>{{$Gsetting->footer}}</strong> 
  </footer>

  <div class="control-sidebar-bg"></div>
</div>

<script src="{{asset('/assets/admin/js/jquery-2.2.3.min.js')}}"></script>

<script src="{{asset('/assets/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/assets/admin/dist/js/app.min.js')}}"></script>
<script src="{{asset('/assets/admin/js/bootstrap-table.js')}}"></script>
<script src="{{asset('/assets/admin/js/bootstrap-tagsinput.min.js')}}"></script>
<script src="{{asset('/js/sweetalert.js')}}"></script>
<script type="text/javascript">
  $(".alert").delay(4000).slideUp(300, function() {
       $(this).alert('close');
    });
</script>
<script type="text/javascript">
    function  checkDelete()
    {
        chk = confirm('Are You want to sure delete ??');
        if(chk){
            return true;
        }else{
            return false;
        }
    }
</script>

@include('Alerts::alerts')
@yield('script')
  </body>
</html>
