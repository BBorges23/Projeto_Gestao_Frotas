<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark ps bg-white" id="sidenav-main">

    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-0" href="#" target="_blank">
            <img src="{{asset('images/logo.png')}}" class="navbar-brand-img h-100" alt="main_logo">
            <span class="ms-1 font-weight-bold text-white">Frotas</span>
        </a>
    </div>


    <hr class="horizontal light mt-0 mb-2">

    <div class="collapse navbar-collapse w-auto ps ps--active-x ps--active-y" id="sidenav-collapse-main">
        <ul class="navbar-nav">

            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('admin.vehicles.index')}}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-car fa-xl"></i>
                    </div>

                    <span class="nav-link-text ms-1">Veículos</span>
                </a>
            </li>


            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('admin.drivers.index')}}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-clipboard-user fa-xl"></i>
                    </div>

                    <span class="nav-link-text ms-1">Motoristas</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('admin.travels.index')}}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-route fa-xl"></i>
                    </div>

                    <span class="nav-link-text ms-1">Viagens</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="{{route('admin.maintenances.index')}}">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-screwdriver-wrench fa-xl"></i>
                    </div>

                    <span class="nav-link-text ms-1">Manutenções</span>
                </a>
            </li>


            <li class="nav-item mt-3">
                <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Utilizador</h6>
            </li>

            <li class="nav-item">
                <a class="nav-link text-white " href="./profile.html">

                    <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fa-solid fa-user fa-xl"></i>
                    </div>

                    <span class="nav-link-text ms-1">Perfil</span>
                </a>
            </li>


        </ul>
        <div class="ps__rail-x" style="width: 250px; left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 214px;"></div></div><div class="ps__rail-y" style="top: 0px; height: 419px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 359px;"></div></div></div>

    <div class="sidenav-footer position-absolute w-100 bottom-0 ">

    </div>

    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div>
</aside>
