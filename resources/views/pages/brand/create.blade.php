@extends('index')
@section('title','Marcas')
@section('subtitle', ' -> Criar')

@section('content')
    @component('components.create_form', [
    'route_create' => 'admin.brands.store',
    'cor' => 'bg-info',
    'imagem' => 'images/vehicle.png',
    'nome' => 'Criar Marca',
    'titulo1' => 'Nome da Marca',
    'tipo1' => 'text',
    'input_nome1' => 'name',
    'cancelar' => 'admin.brands.index'
])
    @endcomponent
@endsection
