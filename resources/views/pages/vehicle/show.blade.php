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
    'titulo4' => 'Condição',
    'informacao4' => $vehicle->condition,
    'route1' => auth()->user()->getTypeUser().'.vehicles.index',
    'route2' => $vehicle->trashed() ? null : 'admin.vehicles.edit',
    'route3' => $vehicle->trashed() ? null : 'admin.vehicles.destroy',
    'route_update' => 'gestor.vehicles.show'
    ])
    @endcomponent
@endsection


