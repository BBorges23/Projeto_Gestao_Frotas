@extends('index')
@section('title', 'Viagens')
@section('subtitle', ' -> Detalhes')
@section('content')

    @component('components.show_details', [
    'cor' => 'bg-warning',
    'imagem' => 'images/mapa.png',
    'nome' => 'Motorista',
    'descricao' => $driver->user->name,
    'estado' => 'Estado Motorista',
    'titulo1' => 'ID',
    'informacao1' => $travel->id,
    'titulo2' => 'Matricula',
    'informacao2' => $vehicle->licence_plate,
    'titulo3' => 'Origem',
    'informacao3' => date('d-m-Y', strtotime($travel->date_start))  .' | '. $travel->coords_origem ,
    'titulo4' => 'Destino',
    'informacao4' =>  date('d-m-Y', strtotime($travel->date_end))  .' | '. $travel->coords_destino,
    'id' => $travel->id,
    'route1' => auth()->user()->getTypeUser().'.travels.index',
    'route2' => $travel->state == 'PROCESSANDO' ? 'admin.travels.edit' : null,
    'route3' => $travel->state == 'PROCESSANDO' ? 'admin.travels.destroy' : null,
    'status_driver' => $travel->comments ?: "N/A",
    //'driver_state' => $travel->state == 'PROCESSANDO' ? $travel->driver_state : null,
    'driver_state' => $travel->driver_state,
    'state' =>$travel->state,
    'route4' => 'driver.home.index',
    'date_start'=> $travel->date_start ,
    'date_now'=> date("Y-m-d").now()
    ])
    @endcomponent

@endsection


