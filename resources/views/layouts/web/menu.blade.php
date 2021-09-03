<!-- GUEST MENU -->
<div class="d-flex flex-column flex-lg-row">
    <li class="nav-item">
        <a class="nav-link heather-color {{ (request()->is('investment*')) ? 'active' : '' }}"
           href="{{ route('investment') }}" data-offset="100">
            <strong>{{ __('I\'m an investor') }}</strong>
        </a>
    </li>
    @if(!auth()->guest())
        <li class="nav-item">
            <a class="nav-link heather-color {{ (request()->is('web.courses*')) ? 'active' : '' }}"
               href="{{ route('web.courses.all') }}" data-offset="100">
                <strong>{{__('Courses')}}</strong>
            </a>
        </li>
    @endif

    <li class="nav-item">
        <a class="nav-link heather-color {{ (request()->is('web.blog*')) ? 'active' : '' }}"
           href="{{ route('web.blog.index') }}" data-offset="100">
            <strong>{{__('Blog')}}</strong>
        </a>
    </li>

    @if(!auth()->guest())
        <li class="nav-item">
            <a class="nav-link heather-color {{ (request()->is('enrolls*')) ? 'active' : '' }}"
               href="{{ route('web.enrolls')}}" data-offset="100">
                {{--href="{{ route('web.courses.map', ['certificate-como-partner']) }}" --}}
                <strong>{{__('menu.partner_program')}}</strong>
            </a>
        </li>
    @endif

    @if(auth()->guest())
        <li class="nav-item">
            <a class="nav-link heather-color {{ (request()->is('register*')) ? 'active' : '' }}"
               href="{{route('register')}}" data-offset="100">
                <strong>{{__('Join our work team')}}</strong>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link pt-0-1 {{ (request()->is('login*')) ? 'active' : '' }}"
               href="{{ route('login') }}" data-offset="100">
                <button type="button"
                        class="btn btn-outline-white btn-rounded btn-md z-depth-0 m-0 pt-2">{{ __('Login') }}
                    <i
                            class="fas fa-angle-double-right"></i></button>
            </a>
        </li>
    @endif
</div>
<!--GUEST MENU -->


<!--AUTH MENU -->

@if(auth()->user())


    <div class="d-flex row wrap align-items-center">


        @if(auth()->user()->hasPermissionTo('access_to_admin_panel') || auth()->user()->hasRole('Super Admin'))

            <li class="nav-item">
                <a class="nav-link pt-0-1"
                   href="{{ route('users.index') }}" data-offset="100">
                    <i class="fas fa-angle-double-right"></i>
                    Administrar
                </a>

            </li>
        @endif



        @include('layouts.web.cart')

        <li class="nav-item dropdown col-12 col-lg">
            <!-- PROFILE LINK -->
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
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">


                <a class="dropdown-item" href="{{route('users.web.profile',auth()->user()->id)}}">
                    {{__('menu.profile')}}
                </a>

                <a class="dropdown-item {{ (request()->is('partner/investments*')) ? 'active' : '' }}"
                   href="{{ route('investments.index') }}" data-offset="100">
                    <strong>{{__('menu.my_investors')}}</strong>
                </a>

                <a class="dropdown-item" href="{{ route('web.enrolls') }}">
                    {{__('menu.my_courses')}}
                </a>

                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                      style="display: none;">
                    @csrf
                </form>

            </div>
        </li>

    </div>

@endif

<!-- AUTH MENU -->
