@extends('index')
@section('title', 'Modelos')
@section('subtitle', ' -> Detalhes')

@section('content')

    @component('components.show_details', [
    'cor' => 'bg-info',
    'imagem' => 'images/vehicle.png',
    'titulo1' => 'Modelo ID',
    'informacao1' => $carmodel->id,
    'titulo2' => 'Nome Modelo',
    'informacao2' => $carmodel->name,
    'titulo3' => 'Nome de Marca',
    'informacao3' => $carmodel->brand->name,
    'id' => $carmodel->id,
    'route1' => 'admin.carmodels.index',
    'route2' => 'admin.carmodels.edit',
    'route3' => 'admin.carmodels.destroy'
    ])

    @endcomponent

@endsection

