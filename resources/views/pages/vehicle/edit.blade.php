<div>
    <h1>Página dos Veiculos</h1>

    <!-- Formulário para editar o registro -->
    <h1>Editar Veículo</h1>
    <form class="form-custom" method="POST" action="{{ route('admin.vehicles.update', $vehicle->id) }}">
        @csrf
        @method('PUT')

        <table>
            <tr>
                <th>Modelo ID</th>
                <td>
                    <select name="model_id">
                        @foreach($models as $model)
                            <option value="{{ $model->id }}" {{ $vehicle->model_id == $model->id ? 'selected' : '' }}>
                                {{ $model->name }}
                            </option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Licence Plate</th>
                <td><input type="text" name="licence_plate" value="{{ $vehicle->licence_plate }}"></td>
            </tr>
            <tr>
                <th>Year</th>
                <td><input type="text" name="year" value="{{ $vehicle->year }}"></td>
            </tr>
            <tr>
                <th>Date Buy</th>
                <td><input type="date" name="date_buy" value="{{ $vehicle->date_buy }}"></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Editar Veículo</button>
    </form>
</div>
