@extends('index')
@section('title', 'Modelos')
@section('subtitle', ' -> Editar')

@section('content')

@foreach($brands as $brand) @endforeach

    @component('components.edit_details', [
        'route_update' => 'admin.carmodels.update',
        'id' => $carmodel->id,
        'cor' => 'bg-info',
        'imagem'=> 'images/vehicle.png',
        'nome' => 'Editar Modelo',
        'titulo1' => 'Nome do Modelo',
        'tipo1' => 'text',
        'nome1' => 'name',
        'input1' => $carmodel->name,
        'disabled1' => '',
        'route_show' => 'admin.carmodels.show',
        'titulo3' => 'Marca',
        'select1' => 'brand_id',
        'array1' => $brands,
        'option1' => $brand,
        'selected1' => $carmodel->brand->id
        ])
    @endcomponent
@endsection
