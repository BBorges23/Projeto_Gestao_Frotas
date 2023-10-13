<div>

    <h1>Detalhes do Motorista</h1>

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

    <a href="{{ route('admin.drivers.index') }}">Voltar para a lista de veículos</a>
</div>
