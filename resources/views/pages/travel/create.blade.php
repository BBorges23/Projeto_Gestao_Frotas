@extends('index')
@section('title', 'Viagens')
@section('subtitle', ' -> Criar')
@section('content')


    @foreach($vehicles as $vehicle)
    @endforeach

    @foreach($drivers as $driver)
    @endforeach
        @component('components.create_form', [
        'route_create' => auth()->user()->getTypeUser().'.travels.store',
        'imagem' => 'images/mapa.png',
        'cor' => 'btn-warning',
        'nome' => 'Criar Viagem',
        'titulo1' => 'Coordenadas de Origem',
        'tipo1' => 'text',
        'input_nome1' => 'coords_origem',
        'titulo2' => 'Coordenadas de Destino',
        'tipo2' => 'text',
        'input_nome2' => 'coords_destino',
        'titulo6' => 'Condutor',
        'select6' => 'driver_id',
        'array6' => $drivers,
        'option6' => $driver,
        'titulo7' => 'Veiculo',
        'select7' => 'vehicle_id',
        'array7' => $vehicles,
        'option7' => $vehicle,
        'cancelar' => auth()->user()->getTypeUser().'.travels.index',
        'titulo3'=> "Data início",
        'tipo3'=> 'date',
        'input_nome3'=> "date_start",
        'titulo4'=> "Data fim",
        'tipo4'=> 'date',
        'input_nome4'=> "date_end"
       ])
        @endcomponent

@endsection

