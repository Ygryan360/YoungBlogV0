<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>@yield('title') - YoungBlog</title>
    <meta name="author" content="Rayane Tchabodi">
    <meta property="og:description" content="@yield('og-description')">
    <meta property="og:locale" content="fr_FR" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title')" />
    <meta property="og:url" content="@yield('url')" />
    <meta property="og:site_name" content="{{ env('APP_NAME') }}" />
    <meta property="og:image" content="{{ asset('img/cover.png') }}" />
    <meta name="theme-name" content="galaxy" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
        integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/1d0a60e523.js" crossorigin="anonymous"></script>
    <link rel="canonical" href="{{ route('blog.home') }}" />
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>

<body>
    <x-preloader-wrapper />
    <section class="d-flex">
        <x-navigation-links />
        <div class="main-content">
            <x-navigation-mobile />
            <div class="container pt-4 mt-5 min-vh-100">
                @if (session('success'))
                    <h3 class="bg-dark text-white mb-4 p-3 font-italic text-center">
                        {{ session('success') }}
                    </h3>
                @endif

                @yield('content')
            </div>
            <x-footer />
        </div>
    </section>
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
