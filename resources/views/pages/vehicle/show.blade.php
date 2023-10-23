@extends('index')
@section('title', 'Detalhes do veículo')

@section('content')
    <div class="container">
        <div class="vehicle-details">
            <table class="table">
                <tr>
                    <th>Modelo</th>
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
        @role('admin')
        <a class="btn btn-warning" href="{{ route('admin.vehicles.edit',$vehicle->id) }}">Editar</a><br />
        <form class="form-custom" method="POST"
              action="{{route('admin.vehicles.destroy',$vehicle->id)}}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar
            </button><br />
        </form>
        <a class="btn btn-primary" href="{{ route('admin.vehicles.index') }}">Voltar para a lista de veículos</a>
        @endrole
    </div>
@endsection
