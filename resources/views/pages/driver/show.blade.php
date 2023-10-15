@extends('index')
@section('title','Detalhes do Motorista')

@section('content')
    <div>
        <table>
            <tr>
                <th>Naome</th>
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

        <a href="{{ route('admin.drivers.index') }}">Voltar para a lista de veÃ­culos</a>
    </div>
@endsection
