@extends('index')
@section('title', 'Viagens')
@section('subtitle', ' -> Detalhes')
@section('content')

    @component('components.show_details', [
    'cor' => 'bg-warning',
    'imagem' => 'images/mapa.png',
    'nome' => 'Motorista',
    'descricao' => $driver->user->name,
    'estado' => 'Estado',
    'titulo1' => 'ID',
    'informacao1' => $travel->id,
    'titulo2' => 'Matricula',
    'informacao2' => $vehicle->licence_plate,
    'titulo3' => 'Origem',
    'informacao3' => $travel->coords_origem,
    'titulo4' => 'Destino',
    'informacao4' => $travel->coords_destino,
    'id' => $travel->id,
    'route1' => auth()->user()->getTypeUser().'.travels.index',
    'route2' => 'admin.travels.edit',
    'route3' => 'admin.travels.destroy',
    'status_driver' => $travel->comments ?: "N/A",
    'driver_state' => $travel->driver_state,
    'route4' => 'driver.home.index'

    ])
    @endcomponent

@endsection


