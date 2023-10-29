@extends('index')
@section('title', 'Veículos')
@section('subtitle', ' -> Detalhes')
@section('content')

    @component('components.show_details', [
    'cor' => 'bg-info',
    'imagem' => 'images/vehicle.png',
    'nome' => $model->brand->name,
    'descricao' => $model->name,
    'titulo1' => 'Matricula',
    'informacao1' => $vehicle->licence_plate,
    'titulo2' => 'Ano',
    'informacao2' => $vehicle->year,
    'titulo3' => 'Data de Compra',
    'informacao3' => $vehicle->date_buy,
    'id' => $vehicle->id,
    'route1' => auth()->user()->getTypeUser().'.vehicles.index',
    'route2' => 'admin.vehicles.edit',
    'route3' => 'admin.vehicles.destroy'
    ])
    @endcomponent
@endsection
