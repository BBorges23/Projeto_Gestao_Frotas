<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky" id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
            @if(request()->routeIs("*.vehicles.*"))
                <a href="{{ route(auth()->user()->getTypeUser().'.vehicles.index') }}">@yield('title')</a>
            @endif
            @if(request()->routeIs("*.drivers.*"))
                <a href="{{ route(auth()->user()->getTypeUser().'.drivers.index') }}">@yield('title')</a>
            @endif
            @if(request()->routeIs("*.travels.*"))
                <a href="{{ route(auth()->user()->getTypeUser().'.travels.index') }}">@yield('title')</a>
            @endif
            @if(request()->routeIs("*.maintenances.*"))
                <a href="{{ route(auth()->user()->getTypeUser().'.maintenances.index') }}">@yield('title')</a>
            @endif
            @yield('subtitle')
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">

            </div>
            <form method="POST" action="https://material-dashboard-laravel.creative-tim.com/sign-out" class="d-none" id="logout-form">
                <input type="hidden" name="_token" value="shUnWPbTPSOqlLQNdcSov4k0UQmkOUDnwfjdZXw9"> </form>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex align-items-center">
                    @auth()
                        <form method="POST" action="{{route('logout')}}">
                            @csrf
                            <button class="nav-link" href="{{route('logout')}}">
                                <div class="sb-nav-link-icon"><i class="fa-solid fa-right-to-bracket"></i></div>
                                Logout
                            </button>
                        </form>
                    @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>
