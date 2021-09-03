<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.googleapis.com/css?family=Nunito">
    <script async src="https://kit.fontawesome.com/8ab43cbc45.js" crossorigin="anonymous"></script>

    <!-- Styles -->
    <link rel="shortcut icon" type="image/png" href="{{asset('img/azell_logo.png')}}">

    <link rel="stylesheet" href="{{ asset(mix('css/admin_panel/app.css')) }}">


    {!! SEO::generate() !!}

    @yield('styles')


</head>
<body class="fixed-sn">
<!-- Main Navigation -->
<header>

@include('layouts.admin.left_sidebar')

@if(isset($addRightSidebar))
    @include('layouts.admin.right_sidebar',['title' => $rightSidebarTitle ])
@endif

<!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg scrolling-navbar double-nav">
        <!-- SideNav slide-out button -->
        <div class="float-left">
            <a href="#" data-activates="slide-out" class="button-collapse collapse-left"><i class="fas fa-bars"></i></a>
        </div>


        <!-- Breadcrumb -->
        <div class="breadcrumb-dn mr-auto">
            <p>AzellFT</p>
        </div>

        <div class="d-flex change-mode">
            <!--BEGIN BUTTON CHANGE MODE-->
            <div class="ml-auto mb-0 mr-3 change-mode-wrapper" style="display: none">
                <button class="btn btn-outline-black btn-sm" id="dark-mode">Change Mode</button>
            </div>
            <!--END BUTTON CHANGE MODE-->

            <!-- Navbar links -->
            <ul class="nav navbar-nav nav-flex-icons ml-auto align-items-center">


                <!-- PROFILE Dropdown -->
                <li class="nav-item dropdown notifications-nav">
                    <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">
                            <i class="fas fa-chart-line mr-2" aria-hidden="true"></i>
                            <span>Your campaign is about to end</span>
                            <span class="float-right"><i class="far fa-clock" aria-hidden="true"></i> 53 min</span>
                        </a>
                    </div>
                </li>

                <li class="nav-item dropdown mx-2">
                    <a class="nav-link dropdown-toggle waves-effect" href="#" id="userDropdown" data-toggle="dropdown"
                       aria-haspopup="true" aria-expanded="false">

                        <img
                                src="{{!empty(auth()->user()->profile->photo) ? asset(auth()->user()->profile->photo) : asset('img/user.png')}}"
                                class="profile-avatar"
                                alt=""/>

                        <div class="clearfix d-none d-sm-inline-block ml-2">
                            {{ auth()->user()->profile->name }}
                        </div>

                    </a>
                    <!-- PROFILE LINK -->

                    <!-- LOGOUT LINK -->
                    <div class="dropdown-menu dropdown-menu-right  dropdown-success" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="{{route('users.profile',auth()->user()->id)}}">Mi Perfil</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                              style="display: none;">
                            @csrf
                        </form>

                    </div>
                    <!-- LOGOUT LINK -->
                </li>

                @include('layouts.language_dropdown')

            </ul>
            <!-- Navbar links -->

        </div>

    </nav>
    <!-- Navbar -->
</header>
<!-- Main Navigation -->

<!-- Main layout -->
<main>

    @if(isset($addRightSidebar))
        <a href="#" data-activates="slide-out-right"
           class="btn-floating btn-lime-green collapse-right btn-lg "><i class="fas fa-bars text-tangaroa"></i></a>
    @endif

    <div class="container-fluid main-content" id="content">


        @yield('content')

    </div>
</main>
<!-- Main layout -->

<a id="DATA" data-url="{{URL::to('/')}}"></a>
<a id="app" data-url="{{url('/')}}" data-locale="{{app()->getLocale()}}"></a>

<!-- Scripts -->
<script src="{{ asset(mix('js/admin_panel/app.js')) }}"></script>
@yield('scripts')

</body>
</html>
