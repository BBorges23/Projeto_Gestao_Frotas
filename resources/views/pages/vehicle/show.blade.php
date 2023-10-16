@extends('index')
@section('title', 'Detalhes veículo')

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
        <form class="form-custom" method="POST"
              action="{{route('admin.vehicles.destroy',$vehicle->id)}}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar
            </button><br />
        </form>
        <a class="btn btn-primary" href="{{ route('admin.vehicles.index') }}">Voltar para a lista de veículos</a>
    </div>
@endsection
