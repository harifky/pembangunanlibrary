<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">

    <!--Page Title-->
    <title>Landing Page Pembangunan Library</title>

    <!--Meta Keywords and Description-->
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no" />

    <!--Favicon-->
    <link rel="shortcut icon" href="images/favicon.ico" title="Favicon" />

    <!-- Main CSS Files -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Namari Color CSS -->
    <link rel="stylesheet" href="{{ asset('css/namari-color.css') }}">

    <!--Icon Fonts - Font Awesome Icons-->
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">

    <!--Google Webfonts-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>
</head>

<body>
    <div class="page-border" data-wow-duration="0.7s" data-wow-delay="0.2s">
        <div class="top-border wow fadeInDown animated" style="visibility: visible; animation-name: fadeInDown;"></div>
        <div class="right-border wow fadeInRight animated" style="visibility: visible; animation-name: fadeInRight;"></div>
        <div class="bottom-border wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;"></div>
        <div class="left-border wow fadeInLeft animated" style="visibility: visible; animation-name: fadeInLeft;"></div>
    </div>

    <div id="wrapper">

        <header id="banner" class="scrollto clearfix" data-enllax-ratio=".5">
            <div id="header" class="nav-collapse">
                <div class="row clearfix">
                    <div class="col-1">

                        <!--Logo-->
                        <div id="logo">

                            <!--Logo that is shown on the banner-->
                            <img src="images/logo.png" id="banner-logo" alt="Landing Page" />
                            <!--End of Banner Logo-->

                            <!--The Logo that is shown on the sticky Navigation Bar-->
                            <img src="images/logo-2.png" id="navigation-logo" alt="Landing Page" />
                            <!--End of Navigation Logo-->

                        </div>
                        <!--End of Logo-->
                    </div>
                </div>
            </div><!--End of Header-->

            <!--Banner Content-->
            <div id="banner-content" class="row clearfix">
                <div class="col-38">

                    <div class="section-heading">
                        <h1>Selamat datang di Pembangunan Library</h1>
                        <h2>Projek kerjasama jurusan Rekayasa Perangkat Lunak dengan Perpustakaan SMK Negeri 1 Cimahi</h2>
                    </div>

                    <!--Call to Action-->
                    <a href="/login" class="button">LOGIN</a>
                    <!--End Call to Action-->

                </div>
            </div><!--End of Row-->
        </header>
</body>

</html>