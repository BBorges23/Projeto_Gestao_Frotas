@extends('index')
@section('title', 'Criar Conta')
@section('subtitle', ' -> Criar')


@foreach($roles as $role)
    @section('content')
        @component('components.create_form', [
        'route_create' => 'admin.accounts.store',
        'cor' => 'bg-success',
        'imagem' => 'images/pessoa.png',
        'nome' => 'Criar Conta',
        'titulo1' => 'Nome',
        'tipo1' => 'text',
        'input_nome1' => 'name',
        'titulo2' => 'E-mail',
        'tipo2' => 'text',
        'input_nome2' => 'email',
        'titulo3' => 'Password',
        'tipo3' => 'password',
        'input_nome3' => 'password',
        'titulo8' => 'Tipo de Utilizador',
        'select8' => 'roles',
        'cancelar' => 'admin.accounts.index'
        ])
        @endcomponent
    @endsection
@endforeach
