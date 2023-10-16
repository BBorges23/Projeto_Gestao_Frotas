@extends('index')
@section('title', 'Detalhes Motorista')

@section('content')
    <div class="container">
        <h1 class="page-title">Detalhes do Motorista</h1>

        <div class="driver-details">
            <table class="table">
                <tr>
                    <th>Nome</th>
                    <td>{{ $driver->name }}</td>
                </tr>
                <tr>
                    <th>NIF</th>
                    <td>{{ $driver->nif }}</td>
                </tr>
                <tr>
                    <th>E-mail</th>
                    <td>{{ $driver->email }}</td>
                </tr>
                <tr>
                    <th>Contato</th>
                    <td>{{ $driver->phone }}</td>
                </tr>
            </table>
        </div>

        <a class="btn btn-warning" href="{{ route('admin.drivers.edit',$driver->id) }}">Editar</a><br />
        <form class="form-custom" method="POST"
              action="{{route('admin.drivers.destroy',$driver->id)}}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar
            </button><br />
        </form>
        <a class="btn btn-primary" href="{{ route('admin.drivers.index') }}">Voltar para a lista de Motoristas</a>
    </div>
@endsection
