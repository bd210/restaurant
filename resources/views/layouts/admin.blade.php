<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Restaurant for good food" name="descriptison">
    <meta content="restaurant, restaurantly, food" name="keywords">
    <meta content="Boris Dmitrovic" name="author" >
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Admin Panel - @yield('title')</title>

    <!-- Bootstrap CSS -->
    <link href="{{asset('/')}}css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="{{asset('/')}}css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="{{asset('/')}}css/elegant-icons-style.css" rel="stylesheet" />
    <link href="{{asset('/')}}css/font-awesome.min.css" rel="stylesheet" />
    <!-- full calendar css-->
    <link href="{{asset('/')}}assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
    <link href="{{asset('/')}}assets/fullcalendar/fullcalendar/fullcalendar.css" rel="stylesheet" />
    <!-- easy pie chart-->
    <link href="{{asset('/')}}assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen" />
    <!-- owl carousel -->
    <link rel="stylesheet" href="{{asset('/')}}css/owl.carousel.css" type="text/css">
    <link href="{{asset('/')}}css/jquery-jvectormap-1.2.2.css" rel="stylesheet">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{asset('/')}}css/fullcalendar.css">
    <link href="{{asset('/')}}css/widgets.css" rel="stylesheet">
    <link href="{{asset('/')}}css/style.css" rel="stylesheet">
    <link href="{{asset('/')}}css/style-responsive.css" rel="stylesheet" />
    <link href="{{asset('/')}}css/xcharts.min.css" rel=" stylesheet">
    <link href="{{asset('/')}}css/jquery-ui-1.10.4.min.css" rel="stylesheet">

    <!-- Glyph -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- =======================================================
      Theme Name: NiceAdmin
      Theme URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
      Author: BootstrapMade
      Author URL: https://bootstrapmade.com
    ======================================================= -->

    <!-- template -->
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 15px;
            background: #299be4;
            color: #fff;
            padding: 16px 30px;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn {
            color: #566787;
            float: right;
            font-size: 13px;
            background: #fff;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            border: none;
            outline: none !important;
            margin-left: 10px;
        }
        .table-title .btn:hover, .table-title .btn:focus {
            color: #566787;
            background: #f2f2f2;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table tr th:first-child {
            width: 60px;
        }
        table.table tr th:last-child {
            width: 100px;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }
        table.table td:last-child i {
            opacity: 0.9;
            font-size: 22px;
            margin: 0 5px;
        }
        table.table td a {
            font-weight: bold;
            color: #566787;
            display: inline-block;
            text-decoration: none;
        }
        table.table td a:hover {
            color: #2196F3;
        }
        table.table td a.settings {
            color: #2196F3;
        }
        table.table td a.delete {
            color: #F44336;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table .avatar {
            border-radius: 50%;
            vertical-align: middle;
            margin-right: 10px;
        }
        .status {
            font-size: 30px;
            margin: 2px 2px 0 0;
            display: inline-block;
            vertical-align: middle;
            line-height: 10px;
        }
        .text-success {
            color: #10c469;
        }
        .text-info {
            color: #62c9e8;
        }
        .text-warning {
            color: #FFC107;
        }
        .text-danger {
            color: #ff5b5b;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li a:hover {
            color: #666;
        }
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .pagination li.active a:hover {
            background: #0397d6;
        }
        .pagination li.disabled i {
            color: #ccc;
        }
        .pagination li i {
            font-size: 16px;
            padding-top: 6px
        }
        .hint-text {
            float: left;
            margin-top: 10px;
            font-size: 13px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
<!-- container section start -->

<section id="container" class="">


    @include('components.adminComponents.header')
    <!--header end-->

    <!--sidebar start-->
    @include('components.adminComponents.slidebar')
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
        <section class="wrapper">
            @empty(!session('uspesno'))
                <div class="alert alert-success">  <span class="glyphicon glyphicon-ok-sign"></span>    {{ session('uspesno') }}</div>
            @endempty
                @empty(!session('neuspesno'))
                    <div class="alert alert-danger"> <span class="glyphicon glyphicon-remove-sign"></span>   {{ session('neuspesno') }}</div>
            @endempty
            <!--overview start-->
    @yield('content')
            <!-- 'components.adminComponents.help.infobox' -->
            <!--/.row-->

            <!-- Today status end -->

            <!-- statics end -->




            <!-- project team & activity start -->



            <!-- project team & activity end -->

        </section>

    </section>

</section>
    <!--main content end-->

<!-- container section start -->

<!-- javascripts -->
<script src="{{asset('/')}}js/jquery.js"></script>
<script src="{{asset('/')}}js/jquery-ui-1.10.4.min.js"></script>
<script src="{{asset('/')}}js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="{{asset('/')}}js/jquery-ui-1.9.2.custom.min.js"></script>
<!-- bootstrap -->
<script src="{{asset('/')}}js/bootstrap.min.js"></script>
<!-- nice scroll -->
<script src="{{asset('/')}}js/jquery.scrollTo.min.js"></script>
<script src="{{asset('/')}}js/jquery.nicescroll.js" type="text/javascript"></script>
<!-- charts scripts -->
<script src="{{asset('/')}}assets/jquery-knob/js/jquery.knob.js"></script>
<script src="{{asset('/')}}js/jquery.sparkline.js" type="text/javascript"></script>
<script src="{{asset('/')}}assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js"></script>
<script src="{{asset('/')}}js/owl.carousel.js"></script>
<!-- jQuery full calendar -->
<<script src="{{asset('/')}}js/fullcalendar.min.js"></script>
<!-- Full Google Calendar - Calendar -->
<script src="{{asset('/')}}assets/fullcalendar/fullcalendar/fullcalendar.js"></script>
<!--script for this page only-->
<script src="{{asset('/')}}js/calendar-custom.js"></script>
<script src="{{asset('/')}}js/jquery.rateit.min.js"></script>
<!-- custom select -->
<script src="{{asset('/')}}js/jquery.customSelect.min.js"></script>
<script src="{{asset('/')}}assets/chart-master/Chart.js"></script>

<!--custome script for all page-->

<!-- custom script for this page-->
<script src="{{asset('/')}}js/sparkline-chart.js"></script>
<script src="{{asset('/')}}js/easy-pie-chart.js"></script>
<script src="{{asset('/')}}js/jquery-jvectormap-1.2.2.min.js"></script>
<script src="{{asset('/')}}js/jquery-jvectormap-world-mill-en.js"></script>
<script src="{{asset('/')}}js/xcharts.min.js"></script>
<script src="{{asset('/')}}js/jquery.autosize.min.js"></script>
<script src="{{asset('/')}}js/jquery.placeholder.min.js"></script>
<script src="{{asset('/')}}js/gdp-data.js"></script>
<script src="{{asset('/')}}js/morris.min.js"></script>
<script src="{{asset('/')}}js/sparklines.js"></script>
<script src="{{asset('/')}}js/charts.js"></script>
<script src="{{asset('/')}}js/jquery.slimscroll.min.js"></script>
<script src="{{asset('/')}}js/scripts.js"></script>
<script>
    //knob
    $(function() {
        $(".knob").knob({
            'draw': function() {
                $(this.i).val(this.cv + '%')
            }
        })
    });

    //carousel
    $(document).ready(function() {
        $("#owl-slider").owlCarousel({
            navigation: true,
            slideSpeed: 300,
            paginationSpeed: 400,
            singleItem: true

        });
    });

    //custom select box

    $(function() {
        $('select.styled').customSelect();
    });

    /* ---------- Map ---------- */
    $(function() {
        $('#map').vectorMap({
            map: 'world_mill_en',
            series: {
                regions: [{
                    values: gdpData,
                    scale: ['#000', '#000'],
                    normalizeFunction: 'polynomial'
                }]
            },
            backgroundColor: '#eef3f7',
            onLabelShow: function(e, el, code) {
                el.html(el.html() + ' (GDP - ' + gdpData[code] + ')');
            }
        });
    });
</script>

     </body>

</html>
