<div>
    <h1>Página dos Modelos</h1>

    <!-- Exibição dos Detalhes do Veículo -->
    <h1>Detalhes do Modelo</h1>

    <table>
        <tr>
            <th>Modelo ID</th>
            <td>{{ $carmodel->id }}</td>
        </tr>
        <tr>
            <th>Modelo Name</th>
            <td>{{ $carmodel->name }}</td>
        </tr>
        <tr>
            <th>Marca name</th>
            <td>{{ $carmodel->brand->name }}</td>
        </tr>
    </table>

    <a href="{{ route('admin.vehicles.index') }}">Voltar para a lista de veículos</a>
</div>
