<div id="slide-out-right" class="side-nav sn-bg-4 right-nav fixed">
    <ul class="custom-scrollbar">

        <!-- Logo -->
        <li class="logo-sn waves-effect py-3">
            <div class="text-center">
                <a href="{{route('home')}}" class="pl-0">
                    {{$rightSidebarTitle | ''}}
                </a>
            </div>
        </li>

        <!-- Side navigation links -->
    @yield('right_sidebar_items')
    <!-- Side navigation links -->

    </ul>
    <div class="sidenav-bg mask-strong"></div>
</div>
