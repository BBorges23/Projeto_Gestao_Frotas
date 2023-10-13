<div>
    <!-- Formulário para editar o registro -->
    <h1>Editar Motorista</h1>
    <form class="form-custom" method="POST" action="{{ route('admin.drivers.update', $driver->id) }}">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <th>Nome</th>
                <td>
                    <input type="text" name="name" value="{{ $driver->name }}">
                </td>
            </tr>
            <tr>
                <th>NIF</th>
                <td>
                    <input type="text" name="nif" value="{{ $driver->nif }}">
                </td>
            </tr>
            <tr>
                <th>E-mail</th>
                <td>
                    <input type="text" name="email" value="{{ $driver->email  }}">
                </td>
            </tr>
            <tr>
                <th>Contato</th>
                <td>
                    <input type="text" name="phone" value="{{ $driver->phone }}">
                </td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Editar Motorista</button>
    </form>
</div>
