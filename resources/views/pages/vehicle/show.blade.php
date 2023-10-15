@extends('index')
@section('title', 'Mostrar veículo')

@section('content')
    <div class="container">
        <h1 class="page-title">Detalhes do Veículo</h1>

        <div class="vehicle-details">
            <table class="table">
                <tr>
                    <th>Modelo ID</th>
                    <td>{{ $model->name }}</td>
                </tr>
                <tr>
                    <th>Placa</th>
                    <td>{{ $vehicle->licence_plate }}</td>
                </tr>
                <tr>
                    <th>Ano</th>
                    <td>{{ $vehicle->year }}</td>
                </tr>
                <tr>
                    <th>Data de Compra</th>
                    <td>{{ $vehicle->date_buy }}</td>
                </tr>
            </table>
        </div>

        <a class="btn btn-warning" href="{{ route('admin.vehicles.edit',$vehicle->id) }}">Editar</a><br />
        <a class="btn btn-primary" href="{{ route('admin.vehicles.index') }}">Voltar para a lista de veículos</a>
    </div>
@endsection
