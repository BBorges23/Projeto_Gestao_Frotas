@extends('index')
@section('title', 'Motoristas')
@section('subtitle', ' -> Detalhes')
@section('content')

@component('components.show_details',[
    'cor' => 'bg-success',
    'imagem' => 'images/pessoa.png',
    'nome' => $driver->user->name,
    'descricao' => 'Motorista Que Você Respeita',
    'estado' => 'Condição',
    'driver_state' => $driver->condition,
    'titulo1'=> 'NIF',
    'informacao1' => $driver->nif,
    'titulo2' => 'Email',
    'informacao2' => $driver->user->email,
    'titulo3' => 'Telefone',
    'informacao3' => $driver->phone,
    'id' => $driver->id,
    'titulo7' => (!$driver->trashed() && $driver->condition != 'EM TRABALHO') ? 'Condição especial' : null,
    'route1' => auth()->user()->getTypeUser().'.drivers.index',
    'deleted' =>$driver,
    'route2' => $driver->trashed() ? null : 'admin.drivers.edit',
    'route3' => $driver->trashed() ? null : 'admin.drivers.destroy',
    'route_update' => 'gestor.drivers.update'
    ])
@endcomponent

@endsection
