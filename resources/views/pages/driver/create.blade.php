@extends('index')
@section('title', 'Motoristas')
@section('subtitle', ' -> Criar')
@section('content')

    @component('components.create_form', [
    'route_create' => 'admin.drivers.store',
    'cor' => 'bg-success',
    'imagem' => 'images/pessoa.png',
    'nome' => 'Criar Motorista',
    'titulo1' => 'Nome',
    'tipo1' => 'text',
    'input_nome1' => 'name',
    'titulo2' => 'NIF',
    'tipo2' => 'text',
    'input_nome2' => 'nif',
    'titulo3' => 'E-mail',
    'tipo3' => 'text',
    'input_nome3' => 'email',
    'titulo4' => 'Password',
    'tipo4' => 'password',
    'input_nome4' => 'password',
    'titulo5' => 'Contacto',
    'tipo5' => 'text',
    'input_nome5' => 'phone',
    'cancelar' => 'admin.drivers.index'
    ])
    @endcomponent

@endsection
