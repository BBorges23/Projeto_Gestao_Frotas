@extends('index')
@section('title', 'Viagem')
@section('subtitle', ' -> Detalhes')
@section('content')
    <div class="container">
        <div class="driver-details">
            <table class="table">
                <tr>
                    <th>ID: </th>
                    <td>{{ $travel->id }}</td>
                </tr>
                <tr>
                    <th>Motorista: </th>
                    <td>{{$driver->user->name }}</td>
                </tr>
                <tr>
                    <th>Matricula: </th>
                    <td>{{$vehicle->licence_plate}}</td>
                </tr>
                <tr>
                    <th>Origem: </th>
                    <td>{{$travel->coords_origem}}</td>
                </tr>
                <tr>
                    <th>Destino: </th>
                    <td>{{$travel->coords_destino}}</td>
                </tr>
            </table>
        </div>
        @role('admin')
        <a class="btn btn-warning" href="{{ route('admin.travels.edit',$travel->id) }}">Editar</a><br />
        <form class="form-custom" method="POST"
              action="{{route('admin.travels.destroy',$travel->id)}}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar
            </button><br />
        </form>
        @endrole
        <a class="btn btn-primary" href="{{route(auth()->user()->getTypeUser().'.travels.index') }}">Voltar para a lista de Motoristas</a>
    </div>
@endsection
