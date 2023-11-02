<nav class="navbar navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl border border-5 position-sticky blur shadow-blur mt-4 left-auto top-1 z-index-sticky " id="navbarBlur" navbar-scroll="true">
    <div class="container-fluid py-1 px-3 ">
        <nav aria-label="breadcrumb">
            <h5>
                @if(request()->routeIs('*.pesquisa'))
                    <a href="{{route(auth()->user()->getTypeUser().'.'.preg_replace('/\.pesquisa$/', '', request()->route()->getName()).".index")}}" class="link_navbar">@yield('title')</a>
                @elseif(request()->routeIs('home'))
                    <a href="{{route('home')}}" class="link_navbar">@yield('title')</a>
                @else
                    @if(request()->route()->getName())
                        <a href="{{route(preg_replace('/\.\w+$/', '', request()->route()->getName()) .".index")   }}" class="link_navbar">@yield('title')</a>
                    @endif
                @endif
                @yield('subtitle')
            </h5>
        </nav>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbar">
            <hr>
            <ul class="list-group navbar-toggler my-4">
                @if(auth()->user()->getTypeUser() != 'driver')
                    <a class="link_navbar text-center py-2" href="{{route(auth()->user()->getTypeUser() .'.vehicles.index')}}"><i class="fa-solid fa-car" style="color: #17a2b8;"></i>  Veículos</a>
                    <a class="link_navbar text-center py-2" href="{{route(auth()->user()->getTypeUser() .'.drivers.index')}}"><i class="fa-solid fa-clipboard-user" style="color: #28a745;"></i> Motoristas</a>
                @endif
                <a class="link_navbar text-center py-2" href="{{route(auth()->user()->getTypeUser() .'.travels.index')}}"><i class="fa-solid fa-route" style="color: #ffc107;"></i> Viagens</a>
                <a class="link_navbar text-center py-2" href="{{route(auth()->user()->getTypeUser() .'.maintenances.index')}}"><i class="fa-solid fa-screwdriver-wrench" style="color: #6c757d;"></i> Manutenções</a>
            </ul>
                @yield('search-bar')
            <br>
            <form method="POST" action="https://material-dashboard-laravel.creative-tim.com/sign-out" class="d-none " id="logout-form">
                <input type="hidden" name="_token" value="shUnWPbTPSOqlLQNdcSov4k0UQmkOUDnwfjdZXw9"> </form>
            <ul class="navbar-nav  justify-content-end">
                <li class="nav-item d-flex justify-content-center align-content-center">
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
