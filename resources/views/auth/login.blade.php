@include('template.components.head')
<body class="bg-gray-200">
<main class="main-content mt-0 ps">

    <div class="page-header align-items-start min-vh-100" style="background-image: url('{{asset('images/many-transport-trucks-parked-service-station-sunset-ai-generative.jpg')}}')">
        <span class="mask bg-gradient-dark opacity-6"></span>
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-4 col-md-8 col-12 mx-auto">
                    <div class="card z-index-0 fadeIn3 fadeInBottom">
                        <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                            <div class="bg-gradient-dark shadow-primary border-radius-lg py-3 pe-1 d-flex flex-column gap-2 justify-content-center align-items-center ">
                                <img src="{{asset('images/logo.png')}}" alt="main_logo" class="w-15 h-15" >
                                <h4 class="text-white text-center mt-2 mb-0">SISTEMA DE GESTÃO DE FROTAS</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <form  class="text-start" method="POST" action="{{route('login')}}">
                                @csrf
                                <label class="form-label">Email</label>
                                <div class="input-group input-group-outline my-3">
                                    <input value="{{old('email')}}" type="email" class="form-control" name="email">
                                </div>
                                <label class="form-label">Password</label>
                                <div class="input-group input-group-outline mb-3">
                                    <input type="password" name="password" class="form-control">
                                </div>
{{--                                <div class="form-check form-switch d-flex align-items-center mb-3">--}}
{{--                                    <input class="form-check-input" type="checkbox" id="rememberMe" checked="">--}}
{{--                                    <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>--}}
{{--                                </div>--}}
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2"> Entrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    @if($errors->any())
                        <div class="row p-2">
                            <div class="alert alert-danger text-white" role="alert" style="border-color: #ef5350 !important;">
                                <i class="fa fa-exclamation-triangle mr-2"></i> Verifique os dados inseridos:
                                <ul>
                                    @foreach($errors->all() as $message)
                                        <li>{{$message}}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
        <footer class="footer position-absolute bottom-2 py-2 w-100">
            <div class="container">
                <div class="row align-items-center justify-content-lg-between">
                    <div class="col-12 col-md-6 my-auto">
                        <div class="copyright text-center text-sm text-white text-lg-start">
                            © <script>
                                document.write(new Date().getFullYear())
                            </script>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <ul class="nav nav-footer justify-content-center justify-content-lg-end">

                            <li class="nav-item">
                                <a href="#" class="nav-link text-white" target="_blank">About Us</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    </main>

</body>

