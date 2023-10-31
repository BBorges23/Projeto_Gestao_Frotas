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
    'tipo1' => 'text',
    'input_nome1' => 'licence_plate',
    'titulo2' => 'Ano',
    'tipo2' => 'text',
    'input_nome2' => 'year',
    'titulo3' => 'Modelo',
    'select3' => 'carmodel_id',
    'array3' => $carmodels,
    'option3' => $model,
    'titulo4' => 'Data de compra',
    'tipo4' => 'date',
    'input_nome4' => 'date_buy',
    'cancelar' => 'admin.vehicles.index'
])
    @endcomponent
    @endforeach

@endsection

