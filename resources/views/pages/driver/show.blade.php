@extends('index')
@section('title', 'Motoristas')
@section('subtitle', ' -> Detalhes')
@section('content')

@component('components.show_details',[
    'cor' => 'bg-success',
    'imagem' => 'images/pessoa.png',
    'nome' => $driver->user->name,
    'descricao' => 'Motorista Que Você Respeita',
    'titulo1'=> 'NIF',
    'informacao1' => $driver->nif,
    'titulo2' => 'Email',
    'informacao2' => $driver->user->email,
    'titulo3' => 'Telefone',
    'informacao3' => $driver->phone,
    'id' => $driver->id,
    'titulo7' => 'Condição',
    'route1' => auth()->user()->getTypeUser().'.drivers.index',
    'route2' => 'admin.drivers.edit',
    'route3' => 'admin.drivers.destroy'
    ])
@endcomponent

@endsection
