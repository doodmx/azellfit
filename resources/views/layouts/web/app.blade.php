<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/css?family=Nunitof">
    <script async src="https://kit.fontawesome.com/8ab43cbc45.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="{{asset('img/azell_logo.png')}}">

    <link rel="stylesheet" href="{{ asset(mix('css/web/app.css')) }}" media="none" onload="if(media!='all')media='all'">
    <noscript><link rel="stylesheet" href="{{ asset(mix('css/web/app.css')) }}"></noscript>


@yield('styles')


    {!! SEO::generate() !!}

<!-- Global site tag (gtag.js) - Google Analytics -->
    <script defer src="https://www.googletagmanager.com/gtag/js?id=UA-170004987-1"></script>
    <script defer>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-170004987-1');
    </script>


</head>
<body class="intro-page azellft-lp">
<!-- Main navigation -->
<header>
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark scrolling-navbar bg-tangaroa">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-4"
                aria-controls="navbarSupportedContent-4" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://cdn.azellft.com/img/logo_white.png" width="100" alt="{{ config('app.name', 'AzellFT') }}">
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-4">
            <ul class="navbar-nav w-100 d-flex {{auth()->guest() ? 'justify-content-end':'justify-content-between align-items-center'}} text-uppercase smooth-scroll">
                @include('layouts.web.menu')
            </ul>
        </div>
        <!-- Navbar links -->

       @include('layouts.language_dropdown')

    </nav>
    <!-- Navbar -->
    <!-- Intro -->
@yield('intro')
<!-- Intro -->
</header>
<!-- Main navigation -->
<!-- Main content -->
<main>
    <!-- Content without section -->
@yield('content_without_section')
<!-- Content without section -->

    <!-- First container -->
    <div class="container">
        @yield('content')
    </div>
    <!-- First container -->
</main>
<section class="fixed-action-btn" style="top: 0; right: 0;">
    <div class="float-right">
        <a class="btn-floating success-color waves-effect waves-light" href="{{config('social')[2]['url'] }}"
           target="_blank">
            <i class="fab fa-whatsapp text fa-4x" style="font-size: 2.5rem"></i>
        </a>
    </div>

</section>

@if(!isset($removeFooter))
    <!--Footer-->
    <footer class="page-footer text-center pt-0">
        <div class="bg-black-pearl">
            <div class="container">
                <!--Grid row-->
                <div class="row py-4 d-flex align-items-center">
                    <!--Grid column-->
                    <div class="col-12 col-md-5 text-left mb-md-0 mb-2">
                        <h6 class="mb-0 white-text text-center text-md-left">
                            <strong>
                                {!! __('web/footer.social_title') !!}
                            </strong>
                        </h6>
                    </div>
                    <!--Grid column-->
                    <!--Grid column-->
                    <div class="col-12 col-md-7 text-center text-md-right">
                        @foreach( config('social') as $social)
                            <a class="p-2 m-2 fa-lg fb-ic ml-0" href="{{$social["url"]}}" target="_blank">
                                <i class="{!! $social["icon"] !!} h5-responsive text-lime-green mr-lg-4"> </i>
                            </a>
                        @endforeach
                    </div>
                    <!--Grid column-->
                </div>
                <!--Grid row-->
            </div>
        </div>
        <hr class="white my-0">
        <!--Footer Links-->
        <div class="container mt-5 text-center ">
            <div class="row mt-3">
                <div class="col-lg-4 dark-grey-text">
                    <h6 class="text-uppercase">
                        <a href="#">
                            {!! __('web/footer.contact') !!}
                        </a>
                    </h6>
                    <hr class="bg-lime-green mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">
                </div>
                <div class="col-lg-4 dark-grey-text">
                    <h6 class="text-uppercase">
                        <a href="{{route('policies')}}">
                            {!! __('web/footer.privacy_policy') !!}
                        </a>
                    </h6>
                    <hr class="bg-lime-green mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">
                </div>
                <div class="col-lg-4 dark-grey-text">
                    <h6 class="text-uppercase">
                        <a href="{{route('terms')}}">
                            {!! __('web/footer.terms_of_use') !!}
                        </a>
                    </h6>
                    <hr class="bg-lime-green mb-4 mt-0 d-inline-block mx-auto" style="width: 70px;">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 white-text wow fadeIn p-3 text-justify">
                    <small>
                        {!! __('web/footer.note') !!}
                    </small>
                </div>
            </div>
        </div>
        <!--/.Footer Links-->
        <!-- Copyright-->
        <div class="footer-copyright py-3 text-center">
            <div class="container-fluid">
                ©{{date('Y')}} <span>Azell is part of Velta corporations</span>
            </div>
        </div>
        <!--/.Copyright -->
    </footer>
    <!--/.Footer-->

@endif
<a id="app" data-url="{{url('/')}}" data-locale="{{app()->getLocale()}}"></a>

<!-- Scripts -->
<script src="{{ asset(mix('js/web/app.js')) }}"></script>
<script defer src="{{ asset(mix('js/web/jivochat.js')) }}"></script>
<script type="text/javascript">
    /* WOW.js init */
    new WOW().init();
</script>
@yield('scripts')

</body>
</html>
