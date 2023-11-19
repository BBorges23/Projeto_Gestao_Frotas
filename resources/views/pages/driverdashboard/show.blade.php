@extends('index')
@section('title', 'Perfil')
@section('subtitle', ' -> Detalhes')
@section('content')

    @component('components.show_details',[
        'cor' => 'bg-success',
        'imagem' => 'images/pessoa.png',
        'nome' => auth()->user()->name,
        'descricao' => 'Motorista Que Você Respeita',
        'titulo1'=> 'NIF',
        'informacao1' => auth()->user()->driver->nif,
        'titulo2' => 'Email',
        'informacao2' => auth()->user()->email,
        'titulo3' => 'Telefone',
        'informacao3' => auth()->user()->driver->phone,

        ])
    @endcomponent

@endsection
