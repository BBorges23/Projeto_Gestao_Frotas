@extends('index')
@section('title', 'Conta')
@section('subtitle', ' -> Detalhes')
@section('content')

    @component('components.show_details',[
        'cor' => 'bg-success',
        'imagem' => 'images/pessoa.png',
        'nome' => $user->name,
        'descricao' => 'Motorista Que Você Respeita',
        'titulo1'=> 'Nome',
        'informacao1' => $user->name,
        'titulo2' => 'Email',
        'informacao2' => $user->email,
        'id' => $user->id,
        'titulo7' => 'Condição especial',
        'route1' => auth()->user()->getTypeUser().'.account.index',
        'route2' => 'admin.accounts.edit',
        'route3' => 'admin.accounts.destroy',
        'route_update' => 'admin.accounts.update'
        ])
    @endcomponent

@endsection
