<!DOCTYPE html>
<html lang="en">

<head>
    <!--- Basic Page Needs  -->
    <meta charset="utf-8">
    <title>تقدر - @yield('title')</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Mobile Specific Meta  -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('site/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/slicknav.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/jquery.mb.YTPlayer.min.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('site/assets/css/responsive.css') }}">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="{{ asset('site/assets/img/icon/favicon.ico') }}">

    @yield('styles')

    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 30px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #555;
            color: white;
            cursor: pointer;
            padding: 15px;
            border-radius: 4px;
        }

        #myBtn:hover {
            background-color: #efc700;
        }

        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 40px;
            left: 40px;
            background-color: #25d366;
            color: #fff;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }
    </style>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

</head>

<body style="direction: rtl;">
    <!-- preloader area start -->
    <div id="preloader">
        <div class="spinner"></div>
    </div>
    <!-- preloader area end -->

    {{-- Go to top button --}}
    <button onclick="topFunction()" id="myBtn"> <i class="fa fa-angle-up"></i> </button>
    {{-- Go to top button end --}}

    {{-- whatsapp button --}}
    <a href="https://api.whatsapp.com/send?phone={{ \App\Models\Setting::where('id', 1)->first()->admin_phone }}&text=نظام تقدر بخصوص "
        class="float" target="_blank">
        <i class="fa fa-whatsapp my-float"></i>
    </a>
    {{-- whatsapp button end --}}

    @yield('header')

    @yield('content')

    @include('front.layouts.foot')

    {{-- <!-- google map activation start-->
       <script>
    function initMap() {
        // Styles a map in night mode.
        var map = new google.maps.Map(document.getElementById('map'), {
            center: { lat: 40.674, lng: -73.945 },
            zoom: 12,
            styles: [{
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }]
                },
                {
                    "elementType": "labels",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#616161"
                    }]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [{
                        "color": "#f5f5f5"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "administrative.land_parcel",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#bdbdbd"
                    }]
                },
                {
                    "featureType": "administrative.neighborhood",
                    "stylers": [{
                        "visibility": "off"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#eeeeee"
                    }]
                },
                {
                    "featureType": "poi",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#e5e5e5"
                    }]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#9e9e9e"
                    }]
                },
                {
                    "featureType": "road",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#ffffff"
                    }]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#757575"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#dadada"
                    }]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#616161"
                    }]
                },
                {
                    "featureType": "road.local",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#9e9e9e"
                    }]
                },
                {
                    "featureType": "transit.line",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#e5e5e5"
                    }]
                },
                {
                    "featureType": "transit.station",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#eeeeee"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{
                        "color": "#c9c9c9"
                    }]
                },
                {
                    "featureType": "water",
                    "elementType": "labels.text.fill",
                    "stylers": [{
                        "color": "#9e9e9e"
                    }]
                }
            ]
        });
    }
    </script>
    <!-- google map activation end --> --}}

    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>

    <!-- Scripts -->
    <script src="{{ asset('site/assets/js/jquery-3.2.0.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('site/assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/jquery.slicknav.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/jquery.mb.YTPlayer.min.js') }}"></script>
    <script src="{{ asset('site/assets/js/raindrops.js') }}"></script>
    {{-- <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBO_5h890WNShs_YLGivCBfs2U89qXR-7Y&callback=initMap"></script> --}}
    <script src="{{ asset('site/assets/js/theme.js') }}"></script>
    @yield('scripts')
</body>
</html>
