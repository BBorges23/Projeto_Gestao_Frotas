@extends('index')
@section('title', 'Veículos')
@section('subtitle', ' -> Editar')
@section('content')

    @foreach($carmodels as $model) @endforeach

@component('components.edit_details', [
        'route_update' => 'admin.vehicles.update',
        'id' => $vehicle->id,
        'cor' => 'bg-info',
        'imagem'=> 'images/vehicle.png',
        'nome' => 'Editar Veículo',
        'titulo1' => 'Matricula',
        'tipo1' => 'text',
        'nome1' => 'licence_plate',
        'input1' => $vehicle->licence_plate,
        'disabled1' => '',
        'titulo2' => 'Ano',
        'tipo2' => 'text',
        'nome2' => 'year',
        'input2' => $vehicle->year,
        'titulo3' => 'Modelo',
        'select1' => 'carmodel_id',
        'array1' => $carmodels,
        'option1' => $model,
        'selected1' => $vehicle->model->id,
        'cancelar' => 'admin.vehicles.index',
        'titulo6' => 'Data de compra',
        'tipo3' => 'date',
        'nome3' => 'date_buy',
        'input3' => $vehicle->date_buy,
        'disabled2' => '',
        'titulo11' => 'Condição',
        'selected11' => $vehicle->condition,
        'route_show' => 'admin.vehicles.show',
        ])
@endcomponent

@endsection
