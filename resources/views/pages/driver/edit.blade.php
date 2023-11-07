@extends('index')
@section('title', 'Motoristas')
@section('subtitle', ' -> Editar')
@section('content')

    @component('components.edit_details', [
    'route_update' => 'admin.drivers.update',
    'id' => $driver->id,
    'cor' => 'bg-success',
    'imagem' => 'images/pessoa.png',
    'nome' => 'Editar Motorista',
    'titulo1' => 'Nome',
    'tipo1' => 'text',
    'nome1' => 'name',
    'input1' => $driver->user->name,
    'disabled1' => 'disabled',
    'titulo2' => 'NIF',
    'tipo2' => 'text',
    'nome2' => 'nif',
    'input2' => $driver->nif,
    'titulo6' => 'Email',
    'tipo3' => 'text',
    'nome3' => 'email',
    'input3' =>$driver->user->email,
    'disabled2' => 'disabled',
    'titulo7' => 'Contato',
    'tipo4' => 'text',
    'nome4'=> 'phone',
    'input4' => $driver->phone,
    'titulo9' => 'Condição',
    'route_show' => 'admin.drivers.show'
])
    @endcomponent

@endsection
