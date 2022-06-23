<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">

        <link rel="shortcut icon" href="{{asset('public/backend/images/favicon_1.ico')}}">

        <title>Admin Panel</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="{{asset('public/backend/plugins/morris/morris.css')}}">


        <link href="{{asset('public/backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/css/core.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/css/components.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/css/icons.css')}}" rel="stylesheet" type="text/css" />
        <link href="{{asset('public/backend/css/pages.css')}}" rel="stylesheet" type="text/css"/>
        <link href="{{asset('public/backend/css/responsive.css')}}" rel="stylesheet" type="text/css"/>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

        <script src="{{asset('public/backend/js/modernizr.min.js')}}"></script>

        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <div class="text-center">
                        <a href="" class="logo"><i class="icon-magnet icon-c-logo"></i><span>Admin</span></a>
                    </div>
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">
                        <div class="">
                            <div class="pull-left">
                                <button class="button-menu-mobile open-left waves-effect waves-light">
                                    <i class="md md-menu"></i>
                                </button>
                                <span class="clearfix"></span>
                            </div>



                            <ul class="nav navbar-nav navbar-right pull-right">

                                <li class="hidden-xs">
                                    <a href="#" id="btn-fullscreen" class="waves-effect waves-light"><i class="icon-size-fullscreen"></i></a>
                                </li>

                                <li class="dropdown top-menu-item-xs">
                                    <a href="" class="dropdown-toggle profile waves-effect waves-light" data-toggle="dropdown" aria-expanded="true">{{Auth::user()->name}} </a>
                                    <ul class="dropdown-menu">


                                        <li><a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                          document.getElementById('logout-form').submit();"><i class="ti-power-off m-r-10 text-danger"></i> Logout</a></li>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>


                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!--/.nav-collapse -->
                    </div>
                </div>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>

                        	<li class="text-muted menu-title">Navigation</li>

                            <li class="has_sub">
                                <a href="{{(route('dashboard'))}}" class="waves-effect"><i class="ti-home"></i> <span> My Dashboard </span></span></a>

                            </li>
                            <li class="has_sub">
                                <a href="{{(route('all-products'))}}" class="waves-effect"><i class="ti-shopping-cart"></i> <span> My Products </span></span></a>

                            </li>

                            <li class="has_sub">
                                <a href="{{route('add-product')}}" class="waves-effect"><i class="ti-plus"></i> <span> Add Product </span></span></a>

                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
				<!-- Start content -->
				<div class="content">
					<div class="container">


            @yield('content')

        </div> <!-- container -->

    </div> <!-- content -->

    <footer class="footer">
        © {{date('Y')}}. All rights reserved.
    </footer>

</div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->




        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{asset('public/backend/js/jquery.min.js')}}"></script>
        <script src="{{asset('public/backend/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('public/backend/js/detect.js')}}"></script>
        <script src="{{asset('public/backend/js/fastclick.js')}}"></script>

        <script src="{{asset('public/backend/js/jquery.slimscroll.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.blockUI.js')}}"></script>
        <script src="{{asset('public/backend/js/waves.js')}}"></script>
        <script src="{{asset('public/backend/js/wow.min.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.nicescroll.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.scrollTo.min.js')}}"></script>

        <script src="{{asset('public/backend/plugins/peity/jquery.peity.min.js')}}"></script>

        <!-- jQuery  -->
        <script src="{{asset('public/backend/plugins/waypoints/lib/jquery.waypoints.js')}}"></script>
        <script src="{{asset('public/backend/plugins/counterup/jquery.counterup.min.js')}}"></script>



        <script src="{{asset('public/backend/plugins/morris/morris.min.js')}}"></script>
        <script src="{{asset('public/backend/plugins/raphael/raphael-min.js')}}"></script>

        <script src="{{asset('public/backend/plugins/jquery-knob/jquery.knob.js')}}"></script>

        <script src="{{asset('public/backend/pages/jquery.dashboard.js')}}"></script>

        <script src="{{asset('public/backend/js/jquery.core.js')}}"></script>
        <script src="{{asset('public/backend/js/jquery.app.js')}}"></script>





        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>



        <script type="text/javascript">
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });

                $(".knob").knob();

            });
        </script>

        <script type="text/javascript">
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": true,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
                }
        </script>


<script>
    @if(Session::has('message'))
      var type="{{Session::get('alert-type','info')}}"
      switch(type){
          case 'info':
               toastr.info("{{ Session::get('message') }}");
               break;
          case 'success':
              toastr.success("{{ Session::get('message') }}");
              break;
          case 'warning':
             toastr.warning("{{ Session::get('message') }}");
              break;
          case 'error':
              toastr.error("{{ Session::get('message') }}");
              break;
      }
    @endif
 </script>


<script>
    $(document).on("click", "#delete", function(e){
        e.preventDefault();
        var link = $(this).attr("href");
           swal({
             title: "Are you Want to delete?",
             text: "Once Delete, This will be Permanently Delete!",
             icon: "warning",
             buttons: true,
             dangerMode: true,
           })
           .then((willDelete) => {
             if (willDelete) {
                  window.location.href = link;
             }
           });
       });
</script>






    </body>
</html>
