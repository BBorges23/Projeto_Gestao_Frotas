@extends('index')
@section('title','Home')
@section('content')

    <div class="row mx-2">
        <h2 class="mb-4">Gestão Ativos</h2>

        {{--    Motoristas--}}
        <div class="col-md-3 col-6" >

            <div class="small-box bg-success">
                <div class="inner" >
                    <h3><i class="fa-solid fa-address-card"></i> {{$active_drivers}}</h3>
                    <p>Motoristas disponíveis</p>
                </div>
                <div class="icon" >
                    <i class="fa-solid fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{--    Veiculos--}}
        <div class="col-md-3 col-6" >

            <div class="small-box bg-info">
                <div class="inner" >
                    <h3><i class="fa-solid fa-car"></i> {{$active_vehicles}}</h3>
                    <p>Veículos disponíveis</p>
                </div>
                <div class="icon" >
                    <i class="fa-solid fa-car-side"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{--    Viagens--}}
        <div class="col-md-3 col-6" >

            <div class="small-box bg-warning">
                <div class="inner" >
                    <h3><i class="fa-solid fa-location-dot"></i> {{$active_travels}}</h3>
                    <p>Viagens em processamento</p>
                </div>
                <div class="icon" >
                    <i class="fa-solid fa-route"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{--    Manutencoes--}}
        <div class="col-md-3 col-6" >

            <div class="small-box bg-secondary">
                <div class="inner" >
                    <h3><i class="fa-solid fa-oil-can"></i> {{$active_maintenances}}</h3>
                    <p>Manutenções em processamento</p>
                </div>
                <div class="icon" >
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
    <div class="row mx-2">
        <h2 class="mb-4">Gestão Ativos</h2>

        {{--    Motoristas--}}
        <div class="col-md-3 col-6" >

            <div class="small-box bg-success">
                <div class="inner" >
                    <h3><i class="fa-solid fa-address-card"></i> {{$tot_drives}}</h3>
                    <p>Total de Motoristas</p>
                </div>
                <div class="icon" >
                    <i class="fa-solid fa-user"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{--    Veiculos--}}
        <div class="col-md-3 col-6" >

            <div class="small-box bg-info">
                <div class="inner" >
                    <h3><i class="fa-solid fa-car"></i> {{$tot_vehicles}}</h3>
                    <p>Total de Veículos </p>
                </div>
                <div class="icon" >
                    <i class="fa-solid fa-car-side"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{--    Viagens--}}
        <div class="col-md-3 col-6" >

            <div class="small-box bg-warning">
                <div class="inner" >
                    <h3><i class="fa-solid fa-location-dot"></i> {{$tot_travels}}</h3>
                    <p>Total de Viagens</p>
                </div>
                <div class="icon" >
                    <i class="fa-solid fa-route"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        {{--    Manutencoes--}}
        <div class="col-md-3 col-6" >

            <div class="small-box bg-secondary">
                <div class="inner" >
                    <h3><i class="fa-solid fa-oil-can"></i> {{$tot_maintenances}}</h3>
                    <p>Total de Manutenções</p>
                </div>
                <div class="icon" >
                    <i class="fa-solid fa-screwdriver-wrench"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection
