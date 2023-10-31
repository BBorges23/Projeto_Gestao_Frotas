@extends('index')
@section('title', 'Viagens')
@section('subtitle', ' -> Detalhes')
@section('content')

    @component('components.show_details', [
    'cor' => 'bg-warning',
    'imagem' => 'images/mapa.png',
    'nome' => 'Motorista',
    'descricao' => $driver->user->name,
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
    'route2' => auth()->user()->getTypeUser().'.travels.edit',
    'route3' => auth()->user()->getTypeUser().'.travels.destroy'
    ])
    @endcomponent

@endsection
