@extends('index')
@section('title', 'Marcas')
@section('subtitle', ' -> Editar')

@section('content')
    <div>
    @component('components.edit_details', [
            'route_update' => 'admin.brands.update',
            'id' => $brand->id,
            'cor' => 'bg-info',
            'imagem'=> 'images/vehicle.png',
            'nome' => 'Editar Marca',
            'titulo1' => 'Nome da Marca',
            'tipo1' => 'text',
            'nome1' => 'name',
            'input1' => $brand->name,
            'route_show' => 'admin.brands.show'

            ])
    @endcomponent
@endsection
