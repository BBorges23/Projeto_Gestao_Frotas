<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl border border-5 position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky " id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3 ">
        <nav aria-label="breadcrumb">
            <h5>
{{--                @if(request()->routeIs('*.pesquisa'))--}}
{{--                    <a href="{{route(request()->route()->getName())}}">@yield('titulo')</a--}}
{{--                @else--}}
                    <a href="{{route(preg_replace('/\.\w+$/', '', request()->route()->getName()) .".index")   }}">@yield('title')</a>
{{--                @endif--}}
                @yield('subtitle')
            </h5>
        </nav>

        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center " >
                @yield('search-bar')
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
