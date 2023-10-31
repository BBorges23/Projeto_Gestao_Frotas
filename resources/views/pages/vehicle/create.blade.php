@extends('index')
@section('title', 'Veículos')
@section('subtitle', ' -> Criar')
@section('content')

@foreach($carmodels as $model)
    @component('components.create_form', [
    'route_create' => 'admin.vehicles.store',
    'cor' => 'bg-info',
    'imagem' => 'images/vehicle.png',
    'nome' => 'Criar Veículo',
    'titulo1' => 'Matricula',
    'input_nome1' => 'licence_plate',
    'titulo2' => 'Ano',
    'input_nome2' => 'year',
    'titulo3' => 'Modelo',
    'select1' => 'carmodel_id',
    'array1' => $carmodels,
    'option' => $model,
    'cancelar' => 'admin.vehicles.index',
    'titulo4' => 'Data de compra',
    'tipo' => 'date',
    'input_nome3' => 'date_buy'
])
    @endcomponent
    @endforeach

@endsection

