<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Highdmin - Responsive Bootstrap 4 Admin Dashboard</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App favicon -->
        <link rel="shortcut icon" href="{{asset('backend')}}/assets/images/favicon.ico">

        <!-- App css -->
        <link href="{{asset('backend')}}/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend')}}/assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend')}}/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('backend')}}/assets/css/style.css" rel="stylesheet" type="text/css" />

        <script src="{{asset('backend')}}/assets/js/modernizr.min.js"></script>

    </head>


    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left side-menu">

                <div class="slimscroll-menu" id="remove-scroll">

                    <!-- LOGO -->
                    <div class="topbar-left">
                        <a href="index.html" class="logo">
                            <span>
                                <img src="{{asset('backend')}}/assets/images/logo.png" alt="" height="22">
                            </span>
                            <i>
                                <img src="{{asset('backend')}}/assets/images/logo_sm.png" alt="" height="28">
                            </i>
                        </a>
                    </div>

                    <!-- User box -->
                    <div class="user-box">
                        <div class="user-img">
                            <img src="{{asset('uploads/profile_photos')}}/{{auth()->user()->profile_photo}}" alt="user-img" title="Mat Helme" class="rounded-circle img-fluid">
                        </div>
                        <h5><a href="#">{{auth()->user()->name}}</a> </h5>
                        @if (auth()->user()->role == '1')
                            <p class="text-muted">Customer</p>
                            @elseif (auth()->user()->role == '3')
                            <p class="text-muted">Vendor</p>
                            @else
                            <p class="text-muted">Admin</p>
                        @endif
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">

                        @include('admin.sidebar')

                    </div>
                    <!-- Sidebar -->

                    <div class="clearfix"></div>

                </div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->

            <div class="content-page">

                <!-- Top Bar Start -->
                @include('admin.topbar')
                <!-- Top Bar End -->



                <!-- Start Page content -->
                @yield('content')

                <footer class="footer text-right">
                    2018 © Highdmin. - Coderthemes.com
                </footer>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


        </div>
        <!-- END wrapper -->



        <!-- jQuery  -->
        <script src="{{asset('backend')}}/assets/js/jquery.min.js"></script>
        <script src="{{asset('backend')}}/assets/js/popper.min.js"></script>
        <script src="{{asset('backend')}}/assets/js/bootstrap.min.js"></script>
        <script src="{{asset('backend')}}/assets/js/metisMenu.min.js"></script>
        <script src="{{asset('backend')}}/assets/js/waves.js"></script>
        <script src="{{asset('backend')}}/assets/js/jquery.slimscroll.js"></script>

        <!-- Flot chart -->
        <script src="{{asset('backend')}}/assets/plugins/flot-chart/jquery.flot.min.js"></script>
        <script src="{{asset('backend')}}/assets/plugins/flot-chart/jquery.flot.time.js"></script>
        <script src="{{asset('backend')}}/assets/plugins/flot-chart/jquery.flot.tooltip.min.js"></script>
        <script src="{{asset('backend')}}/assets/plugins/flot-chart/jquery.flot.resize.js"></script>
        <script src="{{asset('backend')}}/assets/plugins/flot-chart/jquery.flot.pie.js"></script>
        <script src="{{asset('backend')}}/assets/plugins/flot-chart/jquery.flot.crosshair.js"></script>
        <script src="{{asset('backend')}}/assets/plugins/flot-chart/curvedLines.js"></script>
        <script src="{{asset('backend')}}/assets/plugins/flot-chart/jquery.flot.axislabels.js"></script>

        <!-- KNOB JS -->
        <!--[if IE]>
        <script type="text/javascript" src="../plugins/jquery-knob/excanvas.js"></script>
        <![endif]-->
        <script src="{{asset('backend')}}/assets/plugins/jquery-knob/jquery.knob.js"></script>

        <!-- Dashboard Init -->
        <script src="{{asset('backend')}}/assets/pages/jquery.dashboard.init.js"></script>

        <!-- App js -->
        <script src="{{asset('backend')}}/assets/js/jquery.core.js"></script>
        <script src="{{asset('backend')}}/assets/js/jquery.app.js"></script>

    </body>
</html>
