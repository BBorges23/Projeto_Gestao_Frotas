@extends('index')
@section('title', 'Mostrar veículo')

@section('content')
    <div>

        <table>
            <tr>
                <th>Modelo ID</th>
                <td>{{ $model->name }}</td>
            </tr>
            <tr>
                <th>Licence Plate</th>
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

        <a href="{{ route('admin.vehicles.index') }}">Voltar para a lista de veículos</a>
    </div>
@endsection
