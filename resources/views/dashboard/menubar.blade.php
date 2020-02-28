@extends('dashboard')

@section('menubar')
<style type="text/css">
  .sidebar ul li.active{
    background: red;
  }
</style>

<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar" >
      <ul class="sidebar-menu " >
<!--<li class="{{url()->current() == url('/')?'active':''}}" > home </li>-->

<?php 
        if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='manager'){
      ?>
      <li  class="{{url()->current() == url('/manager')?'active':''}}">
          <a href="{{URL::to('/manager')}}"><i class="fa fa-home"></i> <span>Dashboard</span> </a>
      </li>
<?php }elseif(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='admin'){
      ?>
      <li  class="{{url()->current() == url('/admin')?'active':''}}">
          <a href="{{URL::to('/admin')}}"><i class="fa fa-home"></i> <span> Dashboard</span> </a>
      </li>
<?php }?>


  <?php 
         if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='manager'){
      ?>
    <li class="{{url()->current() == route('news')?'active':''}}">
      <a href="{{route('news')}}"><i class="fa fa-newspaper-o"></i> <span>News</span></a></li>
    
    <li class="{{url()->current() == route('gallery')?'active':''}}">
      <a href="{{route('gallery')}}"><i class="fa fa-camera"></i> <span>Image Gallery</span></a></li>
    <li class="{{url()->current() == route('videos')?'active':''}}">
      <a href="{{route('videos')}}"><i class="fa fa-film"></i> <span>Videos</span></a></li>
    <!--
    <li class="{{url()->current() == route('subscribers')?'active':''}}">
     <a href="{{route('subscribers')}}"><i class="fa fa-users"></i> <span>Subscribers</span></a></li>-->
  <?php } ?>   


    <?php 
         if(Sentinel::check() && Sentinel::getUser()->roles()->first()->slug=='admin'){
      ?>

    <li class="{{url()->current() == route('category')?'active':''}}">
      <a href="{{route('category')}}"><i class="fa fa-sitemap"></i> <span>Category</span></a></li>

     
    <li class="{{url()->current() == route('news')?'active':''}}">
      <a href="{{route('news')}}"><i class="fa fa-newspaper-o"></i> <span>News</span></a></li>
  
    {{--<li class="{{url()->current() == route('mediaGallery')?'active':''}}">
    <a href="{{route('mediaGallery')}}"><i class="fa fa-photo"></i> <span>Media Library</span></a></li>--}}

    {{--<li class="{{url()->current() == route('gallery')?'active':''}}">
      <a href="{{route('gallery')}}"><i class="fa fa-camera"></i> <span>Image Gallery</span></a></li> --}} 
  
    <li class="{{url()->current() == route('staffs')?'active':''}}">
      <a href="{{route('staffs')}}"><i class="fa fa-user"></i> <span>Staffs</span></a></li>

    <li class="{{url()->current() == route('social')?'active':''}}">
      <a href="{{route('social')}}"><i class="fa fa-paper-plane"></i> <span>Social Settings</span></a></li>

    {{--<li class="{{url()->current() == route('advertise')?'active':''}}">
      <a href="{{route('advertise')}}"><i class="fa fa-link"></i> <span>Advertisements</span></a></li>--}}
    
    {{--<li class="{{url()->current() == route('subscribers')?'active':''}}">
     <a href="{{route('subscribers')}}"><i class="fa fa-users"></i> <span>Subscribers</span></a></li>--}}
     
    <li class="{{url()->current() == route('seo')?'active':''}}">
      <a href="{{route('seo')}}"><i class="fa fa-wrench"></i> <span>Seo Tools</span></a></li>

    <li class="{{url()->current() == route('gsettings')?'active':''}}">
      <a href="{{route('gsettings')}}"><i class="fa fa-cogs"></i> <span>General Settings</span></a></li>

    {{--<li class="{{url()->current() == route('themeChoose')?'active':''}}">
    <a href="{{route('themeChoose')}}"><i class="fa fa-paint-brush"></i> <span>Theme Option</span></a></li>--}}
    
    <li class="{{url()->current() == route('slider.index')?'active':''}}">
        <a href="{{route('slider.index')}}"><i class="fa fa-sliders"></i> <span>Slider</span></a>
    </li>

    <li class="{{url()->current() == route('popup_infos.index')?'active':''}}">
        <a href="{{route('popup_infos.index')}}"><i class="fa fa-info"></i> <span>Popup Information</span></a>
    </li>

    <li class="{{url()->current() == route('gallery.index')?'active':''}}">
        <a href="{{route('gallery.index')}}"><i class="fa fa-image"></i> <span>Images Gallery</span></a>
    </li>

    <li class="{{url()->current() == route('videos')?'active':''}}">
      <a href="{{route('videos')}}"><i class="fa fa-film"></i> <span>Videos Gallery</span></a></li>

    <?php }?>   
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
@stop

@section('scripts')

@stop