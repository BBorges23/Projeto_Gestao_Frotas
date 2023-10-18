@extends('index')
@section('title', 'Detalhes do Motorista')

@section('content')
    <div class="container">
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
        @role('admin')
        <a class="btn btn-success" href="{{ route('admin.drivers.create',$driver->id) }}">Criar</a><br />
        <a class="btn btn-warning" href="{{ route('admin.drivers.edit',$driver->id) }}">Editar</a><br />
        <form class="form-custom" method="POST"
              action="{{route('admin.drivers.destroy',$driver->id)}}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar
            </button><br />
        </form>
        <a class="btn btn-primary" href="{{ route('admin.drivers.index') }}">Voltar para a lista de Motoristas</a>
        @endrole
    </div>
@endsection
