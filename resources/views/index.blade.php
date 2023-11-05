<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('template.components.head')
<body class="g-sidenav-show  bg-gray-100">

@include('template.components.sidebar')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">

    @include('template.components.navbar')

    <div class="container-fluid py-4">

        <div class="row min-vh-80 h-100">
            <div class="col-12">
                <div class="d-flex {{isset($between) && $between ? 'justify-content-between' : 'justify-content-end'}}  mb-2">
                @yield('plus_button')
                </div>
                @yield('content')
            </div>
        </div>
    </div>
    @include('template.components.footer')

    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
        <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
    </div>
    <div class="ps__rail-y" style="top: 0px; right: 0px;">
        <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
    </div>
</main>

</body>
</html>
