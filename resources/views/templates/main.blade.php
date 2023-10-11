<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
@include('templates.parts.header')
<body class="sb-nav-fixed">

@include('templates.parts.menu')

<div id="layoutSidenav">
    @include('templates.parts.menu_lateral')

    <div id="layoutSidenav_content">
        <main>
            <h1 class="m-4">@yield('title')</h1>
            <div class="container-fluid px-4">
                @yield('content')
            </div>
        </main>
        @include('templates.parts.footer')
    </div>
</div>

</body>
</html>

