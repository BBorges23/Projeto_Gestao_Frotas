@extends('index')
@section('title','Viagens')
@section('subtitle', ' -> Editar')
@section('content')



@foreach($vehicles as $vehicle) @endforeach

@foreach($drivers as $driver) @endforeach

@component('components.edit_details', [
        'route_update' => 'admin.travels.update',
        'id' => $travel->id,
        'imagem' => 'images/mapa.png',
        'cor' => 'btn-warning',
        'nome' => 'Editar Viagem',
        'titulo1' => 'Coordenadas de Origem',
        'nome1' => 'coords_origem',
        'tipo1' => 'text',
        'input1' => $travel->coords_origem,
        'disabled1' => '',
        'titulo2' => 'Coordenadas de Destino',
        'nome2' => 'coords_destino',
        'tipo2' => 'text',
        'input2' => $travel->coords_destino,
        'titulo4' => 'Veiculo',
        'select2' => 'vehicle_id',
        'array2' => $vehicles,
        'option2' => $vehicle,
        'selected2' => $travel->vehicle->id,
        'titulo5' => 'Motorista',
        'select3' => 'driver_id',
        'array3' => $drivers,
        'option3' => $driver,
        'selected3' => $travel->driver->id,
        'titulo8' => 'Estado',
        'selected4' => $travel->state,
        'route_show' => 'admin.travels.index'

    ])
@endcomponent
@endsection
