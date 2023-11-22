@extends('index')
@section('title', 'Conta')
@section('subtitle', ' -> Editar')

@foreach($roles as $role)
@section('content')

    @component('components.edit_details', [
    'route_update' => 'admin.accounts.update',
    'id' => $user,
    'cor' => 'bg-success',
    'imagem' => 'images/pessoa.png',
    'nome' => 'Editar utilizador',
    'titulo1' => 'Nome',
    'tipo1' => 'text',
    'nome1' => 'name',
    'input1' => $user->name,
    'disabled1' => 'disabled',
    'titulo2' => 'Email',
    'tipo2' => 'text',
    'nome2' => 'email',
    'input2' => $user->email,
    'disabled2' => 'disabled',
    'titulo10' => 'Tipo de Utilizador',
    'select10' => 'id',
    'array10' => $roles,
    'option10' => $role,
    'route_show' => 'admin.accounts.show'
])
    @endcomponent

@endsection
@endforeach
