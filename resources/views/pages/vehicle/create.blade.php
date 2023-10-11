<div>
    <h1>Página dos Veiculos</h1>

    <!-- Formulário para criar um novo registro -->
    <h1>Criar Novo Veículo</h1>
    <form class="form-custom" method="POST" action="{{ route('admin.vehicles.store') }}">
        @csrf
        <table>
            <tr>
                <th>Modelo ID</th>
                <td>
                    <select name="model_id">
                        @foreach($models as $model)
                            <option value="{{ $model->id }}">{{ $model->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Licence Plate</th>
                <td><input type="text" name="licence_plate" value="{{ old('licence_plate') }}"></td>
            </tr>
            <tr>
                <th>Year</th>
                <td><input type="text" name="year" value="{{ old('year') }}"></td>
            </tr>
            <tr>
                <th>Date Buy</th>
                <td><input type="date" name="date_buy" value="{{ old('date_buy') }}"></td>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Criar Veículo</button>
    </form>
</div>
