<!DOCTYPE html>
<html lang="{{ str_replace('', '-', app()->getLocale()) }}">

@include('template.components.head')

<body class="g-sidenav-show  bg-gray-200">

@include('template.components.sidebar')

<main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    @include('template.components.navbar')

    <div class="container-fluid py-4">
        <div class="row min-vh-80 h-100">
            <div class="col-12">

                @yield('content')
            </div>
        </div>
    </div>

@include('template.components.footer')
</main>


</body>
</html>
