<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('title')</title>
    <meta name="description" content="Dashboard | Admin Control">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Minh Khoa">
    <base href="{{ asset('') }}backend/">
    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

    <!-- Font Awesome CSS -->
    <link href="font-awesome/css/all.css" rel="stylesheet" type="text/css"/>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet" type="text/css"/>

    <!-- BEGIN CSS for this page -->
    <link rel="stylesheet" type="text/css" href="plugins/chart.js/Chart.min.css"/>
    <link rel="stylesheet" type="text/css" href="plugins/datatables/datatables.min.css"/>
    <!-- END CSS for this page -->
</head>

<body class="adminbody">

<div id="main">

    <!-- top bar navigation -->
    <div class="headerbar">

        <!-- LOGO -->
        @include('backend.layout.header.logo')

        @include('backend.layout.header.right_header')

    </div>
    <!-- End Navigation -->

    <!-- Left Sidebar -->
    @include('backend.layout.left_sidebar')
    <!-- End Sidebar -->

    <div class="content-page">

        <!-- Start content -->
    @yield('main')
    <!-- END container-fluid -->

    </div>
    <!-- END content -->

</div>
<!-- END content-page -->

<footer class="footer">
            <span class="text-right">
                Contact me <a target="_blank" href="https://facebook.com/adamkhoa03">Minh Khoa</a>
            </span>
</footer>

<script src="js/modernizr.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/moment.min.js"></script>

<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>

<script src="js/detect.js"></script>
<script src="js/fastclick.js"></script>
<script src="js/jquery.blockUI.js"></script>
<script src="js/jquery.nicescroll.js"></script>

<!-- App js -->
<script src="js/admin.js"></script>

</div>
<!-- END main -->

<!-- BEGIN Java Script for this page -->
<script src="plugins/chart.js/Chart.min.js"></script>
<script src="plugins/datatables/datatables.min.js"></script>

<!-- Counter-Up-->
<script src="plugins/waypoints/lib/jquery.waypoints.min.js"></script>

<!-- Charts data -->
<script src="data/data_charts_dashboard.js"></script>
<script>
    $(document).on('ready', function () {
        // data-tables
        $('#dataTable').DataTable({
            data: dataSet,
            columns: [{
                title: "Full name"
            }, {
                title: "Position"
            }, {
                title: "Department"
            }, {
                title: "Date of birth"
            }, {
                title: "Started date"
            }]
        });

        // counter-up
        $('.counter').counterUp({
            delay: 10,
            time: 600
        });
    });
</script>
<!-- END Java Script for this page -->

</body>

</html>
