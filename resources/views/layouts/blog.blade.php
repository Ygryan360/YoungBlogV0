<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1d0a60e523.js" crossorigin="anonymous"></script>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!--Favicon-->
    <!--infos du site -->
    <meta name="author" content="Rayane Tchabodi">
    <meta name="theme-name" content="galaxy" />
    <meta property="og:description"
        content="Découvrez l'univers numérique avec Rayane Tchabodi. Explorez des créations innovantes, des articles inspirants et entrez en contact pour des opportunités passionnantes.">
    <link rel="canonical" href="https://youngryan.onrender.com/" />
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Accueil | Young Ryan" />
    <meta property="og:url" content="https://youngryan.onrender.com/" />
    <meta property="og:site_name" content="Young Ryan" />
    <meta property="og:image" content="{{ asset('img/og-image.png') }}" />
    <title>@yield('title') - YoungBlog</title>
</head>

<body>
    <!-- START preloader-wrapper -->
    <div class="preloader-wrapper">
        <div class="preloader-inner">
            <div class="spinner-border text-red"></div>
        </div>
    </div>
    <!-- END preloader-wrapper -->

    <!-- START main-wrapper -->
    <section class="d-flex">
        <!-- start of sidenav -->
        <aside>
            <div class="sidenav position-sticky d-flex flex-column justify-content-between">
                <a class="navbar-brand" href="{{ route('blog.home') }}" class="logo">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo">
                </a>
                <!-- end of navbar-brand -->

                <div class="navbar navbar-dark my-4 p-0 font-primary">
                    <ul class="navbar-nav w-100">
                        <li class="nav-item {{ request()->routeIs('blog.home') ? 'active' : '' }}">
                            <a class="nav-link text-white px-0 pt-0" href="{{ route('blog.home') }}">Accueil</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('blog.about') ? 'active' : '' }} ">
                            <a class="nav-link text-white px-0" href="{{ route('blog.about') }}">A Propos</a>
                        </li>
                        <li class="nav-item {{ request()->routeIs('blog.contact') ? 'active' : '' }}">
                            <a class="nav-link text-white px-0" href="{{ route('blog.contact') }}">Contact</a>
                        </li>
                    </ul>
                </div>
                <!-- end of navbar -->

                <ul class="list-inline nml-2">
                    <li class="list-inline-item">
                        <a href="https://x.com/ryan_tchabodi" class="text-white text-red-onHover pr-2">
                            <span class="fab fa-x-twitter"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/ryan.tchabodi" class="text-white text-red-onHover p-2">
                            <span class="fab fa-facebook-f"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.instagram.com/ryan.tchabodi" class="text-white text-red-onHover p-2">
                            <span class="fab fa-instagram"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/Ygryan360" class="text-white text-red-onHover p-2">
                            <span class="fab fa-github"></span>
                        </a>
                    </li>
                </ul>
                <!-- end of social-links -->
            </div>
        </aside>
        <!-- end of sidenav -->
        <div class="main-content">
            <!-- start of mobile-nav -->
            <header class="mobile-nav pt-4">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <a href="index.html">
                                <img src="{{ asset('img/logo.png') }}" alt="">
                            </a>
                        </div>
                        <div class="col-6 text-right">
                            <button class="nav-toggle bg-transparent border text-white">
                                <span class="fas fa-bars"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </header>
            <div class="nav-toggle-overlay"></div>
            <!-- end of mobile-nav -->

            <div class="container pt-4 mt-5">
                @yield('content')
            </div>
            <!-- start of footer -->
            <footer class="bg-dark">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-lg-3 col-sm-6 mb-5">
                            <h5 class="font-primary text-white mb-4">BY Young Ryan<sup>TM</sup></h5>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-5">
                            <ul class="list-unstyled">
                                <li><a href="privacy.html">Politique de Confidentialité</a></li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-sm-6 mb-5">
                            <ul class="list-unstyled">
                                <li>&copy {{ date('Y') }} | <a href="{{ route('blog.home') }}">YoungBlog</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- end of footer -->
        </div>

    </section>
    <!-- END main-wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    <script src="{{ asset('js/script.js') }}"></script>
    @yield('scripts')
</body>

</html>
