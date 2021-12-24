<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container">
                <nav class="navbar navbar-expand-lg custom_nav-container ">
                    <h1><b>T</b>ime <b>Z</b>one </h1>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class=""> </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="">Home <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('allproduct') }}">Products</a>
                            </li>
                            <li class="nav-item">
                                <button class="btn btn-light shop"><i class="fa fa-shopping-cart"></i></button>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('login'))
                                    @auth
                                        <a href="{{ url('/home') }}" class="nav-link">Home</a>
                                    @else
                                        <a href="{{ route('login') }}" class="nav-link"><i
                                                class="fa fa-user"></i></a>

                                        @if (Route::has('register'))
                                            {{-- <a href="{{ route('register') }}" class="nav-link">Register</a> --}}
                                        @endif
                                    @endauth
                                @endif
                            </li>
                        </ul>

                    </div>
                </nav>
            </div>
        </header>

        @yield('content')

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="full">
                            <div class="logo_footer">
                                <h1><b>T</b>ime <b>Z</b>one </h1>
                            </div>
                            <div class="">
                                <p><strong>ADDRESS:</strong> 28 RJD Square, Gajera Surat City, INDIA</p>
                                <p><strong>TELEPHONE:</strong> +91 987 654 3210</p>
                                <p><strong>EMAIL:</strong> dk.elaunchinfotech.in</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="widget_menu">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="widget_menu">

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="widget_menu">

                                    <div class="form_sub">
                                        <form>

                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- footer end -->
        <div class="cpy_">
            <p>© 2021 All Rights Reserved By <b>Time Zone</b></p>
        </div>
        <!-- jQery -->
        <script src="js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="js/custom.js"></script>
        <script>
            $(document).on("click", '.shop', function() {
                alert('Please LogIN First...!!!');
            });
        </script>
</body>

</html>
