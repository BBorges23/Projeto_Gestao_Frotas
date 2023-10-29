@extends('index')
@section('title', 'Marcas')
@section('subtitle', ' -> Detalhes')

@section('content')

    @component('components.show_details', [
    'cor' => 'bg-info',
    'imagem' => 'images/vehicle.png',
    'titulo1' => 'Marca ID',
    'informacao1' => $brand->id,
    'titulo2' => 'Nome Marca',
    'informacao2' => $brand->name,
    'id' => $brand->id,
    'route1' => 'admin.brands.index',
    'route2' => 'admin.brands.edit',
    'route3' => 'admin.brands.destroy'
    ])
    @endcomponent

@endsection
