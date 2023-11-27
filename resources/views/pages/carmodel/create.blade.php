@extends('index')
@section('title','Modelos')
@section('subtitle', ' -> Criar')

@section('content')

@foreach($brands as $brand) @endforeach
@component('components.create_form', [
    'route_create' => 'admin.carmodels.store',
    'cor' => 'bg-info',
    'imagem' => 'images/vehicle.png',
    'nome' => 'Criar Modelo',
    'titulo1' => 'Nome do Modelo',
    'tipo1' => 'text',
    'input_nome1' => 'name',
    'titulo3' => 'Marca',
    'select3' => 'brand_id',
    'array3' => $brands,
    'option3' => $brand,
    'cancelar' => 'admin.carmodels.index'
    ])
    @endcomponent

@endsection
