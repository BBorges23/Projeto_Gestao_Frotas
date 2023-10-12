<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Veículo</title>
</head>
<body>
<div>

    <h1>Página de Criação de Veículos</h1>

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

<form method="POST" action="{{route('admin.vehicles.store')}}" >
    @csrf
    <label for="license_plate">Placa do Veículo:</label>
    <input type="text" id="license_plate" name="license_plate"><br><br>

    <label for="year">Ano do Veículo:</label>
    <input type="number" id="year" name="year"><br><br>

    <label for="date_buy">Data de Compra:</label>
    <input type="date" id="date_buy" name="date_buy"><br><br>

    <input type="submit" value="Salvar" href="{{route('admin.vehicles.index')}}">
</form>
</body>
</html>
