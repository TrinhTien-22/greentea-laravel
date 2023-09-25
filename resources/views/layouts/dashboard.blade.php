{{-- <x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> 
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>
    @include('layouts.main');
</x-app-layout> --}}

@extends('layouts.app')
@section('content')
{{-- @include('layouts.main'); --}}

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

	{{-- <link rel="icon" href="images/favicon.ico" type="image/ico" /> --}}

    {{-- <title>Gentelella Alela!</title> --}}
    <link rel="stylesheet" href="{{asset('admin/template/admin.css')}}">
    <!-- Bootstrap -->
    <link href="{{ asset('admin/template/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('admin/template/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    {{-- <link href="{{asset('admin/template/vendors/nprogress/nprogress.css')}}" rel="stylesheet">
    <link href="{{asset('admin/template/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet"> --}}
    <script src="{{asset('https://code.jquery.com/jquery-3.6.0.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css')}}">

    <link href="{{ asset('admin/template/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    
    {{-- <link href="admin/template/vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/> --}}
    
    {{-- <link href="admin/template/vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">  --}}

    <!-- Custom Theme Style -->
    <link href="{{ asset('admin/template/build/css/custom.min.css') }}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col" >
          <div class="left_col scroll-view">
            {{-- <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>Gentelella Alela!</span></a>
            </div> --}}
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('images/image_11.jpg')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2>{{ Auth::user()->name }}</h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu" >
              <div class="menu_section"  >
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-home"></i> Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{route('showmenu')}}" class="page-current" id="danhsachmenu">Danh sách Menu</a></li>
                      <li><a href="{{route('add')}}" class="page-current" id="addmenu">Thêm Menu</a></li>
                      
                      <li><a href="#">Tam</a></li>
                    </ul>
                  </li>                 
                </ul>
                <ul class="nav side-menu">
                  <li><a><i class="fa-regular fa-folder-open"></i> Products <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="{{ route('showproduct')}}" id="danhsachmenu">Danh sách Product</a></li>
                      <li><a href="{{route('showadd')}}"  id="addmenu">Thêm Product</a></li>
                      <li><a href="#">Tam</a></li>
                    </ul>
                  </li>
                  
                </ul>
                {{-- <script>
                  document.addEventListener("DOMContentLoaded", function () {
                      const addmenu = document.getElementById("addmenu");
                      const danhsachmenu = document.getElementById("danhsachmenu");
                  
                      if (window.location.href.includes("addmenu")) {
                          addmenu.classList.add("active");
                          danhsachmenu.addEventListener("click", function (event) {
                              event.preventDefault();
                          });
                      } else if (window.location.href.includes("danhsachmenu")) {
                        danhsachmenu.classList.add("active");
                          addmenu.addEventListener("click", function (event) {
                              event.preventDefault();
                          });
                      }
                  });
                  </script> --}}
              </div>
              {{-- <div class="menu_section">
                <h3>Live On</h3>
                <ul class="nav side-menu">
                  <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="e_commerce.html">E-commerce</a></li>
                      <li><a href="projects.html">Projects</a></li>
                      <li><a href="project_detail.html">Project Detail</a></li>
                      <li><a href="contacts.html">Contacts</a></li>
                      <li><a href="profile.html">Profile</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="page_403.html">403 Error</a></li>
                      <li><a href="page_404.html">404 Error</a></li>
                      <li><a href="page_500.html">500 Error</a></li>
                      <li><a href="plain_page.html">Plain Page</a></li>
                      <li><a href="login.html">Login Page</a></li>
                      <li><a href="pricing_tables.html">Pricing Tables</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-sitemap"></i> Multilevel Menu <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                        <li><a href="#level1_1">Level One</a>
                        <li><a>Level One<span class="fa fa-chevron-down"></span></a>
                          <ul class="nav child_menu">
                            <li class="sub_menu"><a href="level2.html">Level Two</a>
                            </li>
                            <li><a href="#level2_1">Level Two</a>
                            </li>
                            <li><a href="#level2_2">Level Two</a>
                            </li>
                          </ul>
                        </li>
                        <li><a href="#level1_2">Level One</a>
                        </li>
                    </ul>
                  </li>                  
                  <li><a href="javascript:void(0)"><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a></li>
                </ul>
              </div> --}}

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu" >
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>
              
          </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
        
        {{-- @yield('contentadd') --}}
        @if ($activePage === 'add')
        @include('layouts.add')
        @elseif($activePage === 'showmenu')
        @include('layouts.menu')
        @elseif ($activePage === 'contentdashboard')
        @include('layouts.contentdashboard')
        @elseif($activePage === 'update')
        @include('layouts.update')
        @elseif($activePage === 'showproduct')
        @include('layouts/products/menuproduct')
        @elseif($activePage === 'showadd')
        @include('layouts/products/addproduct')
        @elseif($activePage==='showupdate')
        @include('layouts/products/updateproduct')
        @endif
        <!-- /page content -->
        <!-- footer content -->
        <!-- /footer content -->
      </div>
      
      
    </div>
    
    <!-- jQuery -->
    <script src="{{asset('admin/template/main.js')}}"></script>
    
    <script src="{{ asset('admin/template/vendors/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/template/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{asset('admin/template/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>
    
    {{-- <script src="{{asset('admin/template/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('admin/template/vendors/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('admin/template/vendors/iCheck/icheck.min.js')}}"></script> --}}

    {{-- <script src="{{asset('admin/template/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('admin/template/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/pdfmake/build/vfs_fonts.js')}}"></script> --}}
    <script src="{{ asset('admin/template/build/js/custom.min.js') }}"></script>
    <!-- Bootstrap -->
    {{-- <script src="{{asset('admin/template/vendors/gauge.js/dist/gauge.min.js')}}"></script>
    <script src="{{asset('admin/template/vendors/fastclick/lib/fastclick.js')}}"></script> --}}
    {{-- <script src="{{asset('admin/template/vendors/nprogress/nprogress.js')}}"></script> --}}
    
    
    <!-- FastClick -->
    
    {{-- 
    <!-- NProgress -->
    
    <!-- Chart.js -->
    {{-- <script src="admin/template/vendors/Chart.js/dist/Chart.min.js"></script> --}}
    <!-- gauge.js -->
    {{-- 
    <script src="admin/template/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script> --}}
    <!-- iCheck -->
    
    <!-- Skycons -->
    {{-- <script src="admin/template/vendors/skycons/skycons.js"></script> --}}
    <!-- Flot -->
    {{-- <script src="admin/template/vendors/Flot/jquery.flot.js"></script>
    <script src="admin/template/vendors/Flot/jquery.flot.pie.js"></script>
    <script src="admin/template/vendors/Flot/jquery.flot.time.js"></script>
    <script src="admin/template/vendors/Flot/jquery.flot.stack.js"></script>
    <script src="admin/template/vendors/Flot/jquery.flot.resize.js"></script> --}}
    <!-- Flot plugins -->
    {{-- <script src="admin/template/vendors/flot.orderbars/js/jquery.flot.orderBars.js"></script>
    <script src="admin/template/vendors/flot-spline/js/jquery.flot.spline.min.js"></script>
    <script src="admin/template/vendors/flot.curvedlines/curvedLines.js"></script> --}}
    <!-- DateJS -->
    {{-- <script src="admin/template/vendors/DateJS/build/date.js"></script> --}}
    <!-- JQVMap -->
    {{-- <script src="admin/template/vendors/jqvmap/dist/jquery.vmap.js"></script>
    <script src="admin/template/vendors/jqvmap/dist/maps/jquery.vmap.world.js"></script>
    <script src="admin/template/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="admin/template/vendors/moment/min/moment.min.js"></script>
    <script src="admin/template/vendors/bootstrap-daterangepicker/daterangepicker.js"></script> --}}

    <!-- Custom Theme Scripts -->
    
	
  </body>
</html>

@endsection
