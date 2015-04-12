<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cats from Space | 2015 NASA Hackathon</title>

    <!-- Custom CSS -->
    <link href="/css/app.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <style>
    #map-canvas {
        height: 100%;
        margin: 0;
        padding: 0;
    }
    </style>

    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
    
    <script>
    function initialize() {
        var mapOptions = {
            zoom: 4,
            center: new google.maps.LatLng(40.5417228, -110.4755486),
            disableDefaultUI: false,
            mapTypeControl: true,
            mapTypeControlOptions: {
                style: google.maps.MapTypeControlStyle.DEFAULT,
                position: google.maps.ControlPosition.RIGHT_TOP
            },
            zoomControl: true,
            zoomControlOptions: {
                style: google.maps.ZoomControlStyle.SMALL,
                position: google.maps.ControlPosition.RIGHT_BOTTOM
            },
            scaleControl: true,
            panControl: false,
            streetViewControl: true,
            streetViewControlOptions: {
                position: google.maps.ControlPosition.RIGHT_BOTTOM
            },
        };
        var map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>

</head>

<body>
    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand">
                    <a href="#">
                        <img src="/img/cats-from-space-logo.png" width="210" height="33" border="0">
                    </a>
                </li>
                <li>
                    <a href="#">Volcanoes</a>
                </li>
                <li>
                    <a href="#">Icebergs</a>
                </li>
                <li>
                    <a href="#">Cats</a>
                </li>
                <li>
                    <a href="#">Current Location</a>
                </li>
                <li>
                    <a href="#">Search</a>
                </li>
                <li>
                    &copy; 2015 Space Mantis, Inc.
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

                <div id="map-canvas"></div>

                <div class="row">
                    <div class="col-lg-12">
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Scripts -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="/js/app.js"></script>

    <!-- Menu Toggle Script -->
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>

</body>
</html>