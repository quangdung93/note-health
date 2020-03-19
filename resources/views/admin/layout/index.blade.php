<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <title>Ghi Chú Sức Khỏe</title>
    <meta name="description" content="Bootstrap Metro Dashboard">
    <meta name="author" content="Dennis Ji">
    <meta name="keyword" content="Metro, Metro UI, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <base href="{{ asset('') }}">
    <!-- start: CSS -->
    <link id="bootstrap-style" href="admin/css/bootstrap.min.css" rel="stylesheet">
    <link href="admin/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="admin/css/grid-bootstrap.css" rel="stylesheet">
    <link href="admin/css/chosen_new.css" rel="stylesheet">
    <!-- Custom Fonts -->
    <link href="admin_assets/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    @yield('style') 
    <!-- DataTables CSS -->
    <link href="admin_assets/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">
    <link href="admin/css/bootstrap-datetimepicker.css" rel="stylesheet">
    <!-- DataTables Responsive CSS -->
    <link href="admin_assets/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">
    <link id="base-style" href="admin/css/style.css" rel="stylesheet">
    <link id="base-style-responsive" href="admin/css/style-responsive.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800&subset=latin,cyrillic-ext,latin-ext' rel='stylesheet' type='text/css'>
    <!-- end: CSS -->
    <!-- start: Favicon -->
    <link rel="shortcut icon" href="admin/img/favicon.ico">
    <link rel="apple-touch-icon" href="admin/img/iphone.ico">
    <!-- end: Favicon -->
</head>
<body>
    <!-- Header -->
    @include('admin.layout.header')
    <!-- Header -->
    <div class="container-fluid-full">
        <div class="row-fluid">
            <!-- start: Main Menu -->
            @include('admin.layout.menu')
            <!-- end: Main Menu -->
            <noscript>
                <div class="alert alert-block span10">
                    <h4 class="alert-heading">Warning!</h4>
                    <p>You need to have <a href="http://en.wikipedia.org/wiki/JavaScript" target="_blank">JavaScript</a> enabled to use this site.</p>
                </div>
            </noscript>
            <!-- Page Content -->
            @yield('content')
            <!-- /#page-wrapper -->
        </div>
        <!--/#content.span10-->
    </div>
    <!--/fluid-row-->

    <div class="clearfix"></div>
    <div class="clearfix"></div>
    @if(Route::current()->getName() != 'index')
        <a class="return-back hidden-sm">
            <i class="glyphicons-icon white left_arrow"></i>
        </a>
    @endif
    <footer>
        <p>
            <span style="text-align:left;float:left">Developed by <i class="fa fa-love"></i><a href="https://thammyhanquoc.vn">Quang Dũng</a></span>
        </p>
    </footer>
    
    <!-- start: JavaScript-->
    <script src="admin/js/jquery-1.9.1.min.js"></script>
    <script src="admin/js/jquery-migrate-1.0.0.min.js"></script>
    <script src="admin/js/jquery-ui-1.10.0.custom.min.js"></script>
    <script src="admin/js/jquery.ui.touch-punch.js"></script>
    <script src="admin/js/modernizr.js"></script>
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/jquery.cookie.js"></script>
    {{-- <script src='admin/js/fullcalendar.min.js'></script> --}}
    {{-- <script src='admin/js/jquery.dataTables.min.js'></script> --}}
    
    <script src='admin/js/jquery.dataTables_1_10_16.min.js'></script>
    <script src="admin/js/excanvas.js"></script>
    <script src="admin/js/jquery.flot.js"></script>
    <script src="admin/js/jquery.flot.pie.js"></script>
    <script src="admin/js/jquery.flot.stack.js"></script>
    <script src="admin/js/jquery.flot.resize.min.js"></script>
    {{-- <script src="admin/js/jquery.chosen.min.js"></script> --}}
    <script src="admin/js/chosen.jquery.min.js"></script>
    <script src="admin/js/jquery.uniform.min.js"></script>
    <script src="admin/js/jquery.cleditor.min.js"></script>
    <script src="admin/js/jquery.noty.js"></script>
    <script src="admin/js/jquery.elfinder.min.js"></script>
    <script src="admin/js/jquery.raty.min.js"></script>
    <script src="admin/js/jquery.iphone.toggle.js"></script>
    <script src="admin/js/jquery.uploadify-3.1.min.js"></script>
    <script src="admin/js/jquery.gritter.min.js"></script>
    <script src="admin/js/jquery.imagesloaded.js"></script>
    <script src="admin/js/jquery.masonry.min.js"></script>
    <script src="admin/js/jquery.knob.modified.js"></script>
    <script src="admin/js/jquery.sparkline.min.js"></script>
    <script src="admin/js/counter.js"></script>
    <script src="admin/js/retina.js"></script>
    <script src="admin/js/bootstrap-datetimepicker.min.js"></script>
    <script src="admin/js/datepicker-vi.js"></script>
    <script src="admin/js/charts.js" charset="utf-8"></script>

    <!-- Custom Theme JavaScript -->
    <!-- <script src="admin_assets/dist/js/sb-admin-2.js"></script> -->
    <!-- Metis Menu Plugin JavaScript -->
    {{-- <script src="admin_assets/bower_components/metisMenu/dist/metisMenu.min.js"></script> --}}
    <!-- Show Money Number Format -->
    {{-- <script src="admin_assets/dist/js/check-money.js"></script>
    <script type="text/javascript" language="javascript" src="admin_assets/ckeditor/ckeditor.js"></script> --}}
    <script src="admin/js/custom.js"></script>

    <!-- Chèn script -->
    @yield('script') 
    @yield('alert') 
    @yield('option')
    <!-- Chèn script -->
    <!-- end: JavaScript-->
</body>
</html>