<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark ps bg-white" id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        @if(auth()->user()->getTypeUser() === 'driver')
            <a class="navbar-brand m-0 fs-2" href="{{route('driver.home.index')}}">
                <img src="{{asset('images/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Frotas</span>
            </a>
        @else
            <a class="navbar-brand m-0 fs-2" href="{{route('home')}}">
                <img src="{{asset('images/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
                <span class="ms-1 font-weight-bold text-white">Frotas</span>
            </a>
        @endif
    </div>

    <hr class="horizontal light mt-4 mb-2">

    <div class="collapse navbar-collapse w-100 h-100 pt-3" id="sidenav-collapse-main">

        <ul class="navbar-nav">

            @if(auth()->user()->getTypeUser() !== 'driver')
                <li class="nav-item">
                    <a class="nav-link fs-5 text-white" href="{{route(auth()->user()->getTypeUser().'.vehicles.index')}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-car fa-xl"></i>
                        </div>

                        <span class="nav-link-text ms-1">Veículos</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-5 text-white " href="{{route(auth()->user()->getTypeUser().'.drivers.index')}}">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-clipboard-user fa-xl"></i>
                        </div>
                        <span class="nav-link-text ms-1">Motoristas</span>
                    </a>
                </li>


            <li class="nav-item">
                <a class="nav-link fs-5 text-white " href="{{route(auth()->user()->getTypeUser().'.travels.index')}}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-route fa-xl"></i>
                    </div>
                    <span class="nav-link-text ms-1">Viagens</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link fs-5 text-white " href="{{route(auth()->user()->getTypeUser().'.maintenances.index')}}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-screwdriver-wrench fa-xl"></i>
                    </div>
                    <span class="nav-link-text ms-1">Manutenções</span>
                </a>
            </li>

                @role('admin')

                <li class="nav-item mt-3 pt-3">
                    <h6 class="ps-4 fs-6 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Contas</h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link fs-5 text-white " href="{{route('admin.accounts.index')}}">

                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-users-gear"></i>
                        </div>
                        <span class="nav-link-text ms-1">Criar Utilizadores</span>
                    </a>
                </li>
                @endrole
            @endif
            @role('driver')
                <a class="nav-link fs-5 text-white " href="{{route('driver.home.index')}}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-route fa-xl"></i>
                    </div>
                    <span class="nav-link-text ms-1">Viagens</span>
                </a>

            <li class="nav-item mt-3 pt-3">
                <h6 class="ps-4 fs-6 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Utilizador</h6>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white fs-5" href="{{route(auth()->user()->getTypeUser().'.perfil', auth()->user()->id)}}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user fa-xl"></i>
                    </div>

                    <span class="nav-link-text ms-1">Perfil</span>
                </a>
            </li>
                <li class="nav-item">
                    <a class="nav-link text-white fs-5" href="{{route(auth()->user()->getTypeUser().'.travels.history', auth()->user()->id)}}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="fa-solid fa-map-location-dot fa-xl"></i>
                        </div>

                        <span class="nav-link-text ms-1">Histórico</span>
                    </a>
                </li>
            @endrole
        </ul>
        <div class="sidenav-footer position-absolute w-100 bottom-0 "></div>
    </div>

</aside>
