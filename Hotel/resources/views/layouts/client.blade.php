<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Mobile Web-app fullscreen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">

    <!-- Meta tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{asset('assets/client/favicon.ico')}}">

    <!--Title-->
    <title>Colina - Hotel, Resort & Accommodation Website Template</title>

    <!--CSS styles-->
    <link rel="stylesheet" media="all" href="{{asset('assets/client/css/bootstrap.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/client/css/animate.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/client/css/font-awesome.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/client/css/linear-icons.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/client/css/hotel-icons.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/client/css/magnific-popup.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/client/css/owl.carousel.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/client/css/datepicker.css')}}" />
    <link rel="stylesheet" media="all" href="{{asset('assets/client/css/theme.css')}}" />

    <!--Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,500&amp;subset=latin-ext" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&amp;subset=latin-ext" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <div class="page-loader"></div>

    <div class="wrapper">

        <header>

            <!-- ======================== Navigation ======================== -->

            <div class="container">

                <!-- === navigation-top === -->

                <nav class="navigation-top clearfix">

                    <!-- navigation-top-left -->

                    <div class="navigation-top-left">
                        <a class="box" href="#">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a class="box" href="#">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a class="box" href="#">
                            <i class="fa fa-youtube"></i>
                        </a>
                    </div>

                    <!-- navigation-top-right -->

                    <div class="navigation-top-right">
                        <a class="box" href="#">
                            <i class="icon icon-star"></i> 
                            Special offers
                        </a>
                        <a class="box" href="reservation-1.html">
                            <i class="icon icon-tag"></i> 
                            Reservations
                        </a>
                        <a class="box" href="#">
                            <i class="icon icon-phone-handset"></i> 
                            (01) 252-3333
                        </a>
                    </div>
                </nav>

                <!-- === navigation-main === -->

                <nav class="navigation-main clearfix">

                    <!-- logo -->

                    <div class="logo animated fadeIn">
                        <a href="index.html">
                            <img class="logo-desktop" src="{{asset('assets/client/assets/images/logo.png')}}" alt="Alternate Text" />
                            <img class="logo-mobile" src="{{asset('assets/client/assets/images/logo-mobile.png')}}" alt="Alternate Text" />
                        </a>
                    </div>

                    <!-- toggle-menu -->

                    <div class="toggle-menu"><i class="icon icon-menu"></i></div>

                    <!-- navigation-block -->

                    <div class="navigation-block clearfix">

                        <!-- navigation-left -->

                        <ul class="navigation-left">
                            <li>
                                <a href="{{url('/')}}">Home</a>
                            </li>
                            <li>
                                <a href="#">Category <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                                <ul>
                                    @foreach ($categories as $category)
                                    <li><a href="{{route('category.list', [$category->slug, $category->id])}}">{{$category->name}}</a></li>
                                    @endforeach

                                </ul>
                            </li>
                        </ul>

                        <!-- navigation-right -->

                        <ul class="navigation-right">
                            <li>
                                <a href="facility.html">Facilities</a>
                            </li>
                            <li>
                                <a href="#">Blog <span class="open-dropdown"><i class="fa fa-angle-down"></i></span></a>
                                <ul>
                                    <li><a href="blog-category.html">Blog category</a></li>
                                    <li><a href="blog-item.html">Blog item</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="contact.html">Contact</a>
                            </li>
                        </ul>

                    </div> <!--/navigation-block-->

                </nav>
            </div> <!--/container-->

        </header>

        @yield('content')

        <footer>
            <div class="container">

                <!--footer links-->
                <div class="footer-links">
                    <div class="row">
                        <div class="col-sm-6 footer-left">
                            <a href="#">Sitemap</a> &nbsp; | &nbsp; <a href="#">Privacy policy</a> | &nbsp; <a href="#">Guest book</a>
                        </div>
                        <div class="col-sm-6 footer-right">
                            <a href="#">Gallery</a> &nbsp; | &nbsp; <a href="#">Reservations</a> | &nbsp; <a href="#">Help center</a>
                        </div>
                    </div>
                </div>

                <!--footer social-->

                <div class="footer-social">
                    <div class="row">
                        <div class="col-sm-12 text-center hidden">
                            <a href="" class="footer-logo"><img src="{{asset('assets/client/assets/images/logo.png')}}" alt="Alternate Text" /></a>
                        </div>
                        <div class="col-sm-12 icons">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-sm-12 copyright">
                            <small>Copyright &copy; 2017 &nbsp; | &nbsp; <a href="https://themeforest.net/item/colina-hotel-website-template/20977257">Buy Colina Template</a></small>
                        </div>
                        <div class="col-sm-12 text-center">
                            <img src="{{asset('assets/client/assets/images/logo-footer.png')}}" alt="" />
                        </div>
                    </div>
                </div>
            </div>
        </footer>

    </div> <!--/wrapper-->

    <!--JS files-->
    <script src="{{asset('assets/client/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.bootstrap.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.magnific-popup.js')}}"></script>
    <script src="{{asset('assets/client/js/jquery.owl.carousel.js')}}"></script>
    <script src="{{asset('assets/client/js/main.js')}}"></script>
</body>

</html>