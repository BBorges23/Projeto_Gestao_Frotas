<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criação de Veículo</title>
</head>
<body>
<div>

    @if($errors->any())
        {{--Mensagem de erro do topo--}}
        <div class="row p-2">
            <div class="alert alert-danger" role="alert">
                Verifique os dados inseridos
            </div>
        </div>
    @endif

    <!-- Formulário para criar um novo registro -->
    <h1>Criar Novo Veículo</h1>
    <form class="form-custom" method="POST" action="{{ route('admin.vehicles.store') }}">
        @csrf
        <table>
            <tr>
                <th>Modelo ID</th>
                <td>
                    <select name="carmodel_id">
                        @foreach($carmodels as $carmodel)
                            <option value="{{ $carmodel->id }}">{{ $carmodel->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Licence Plate</th>
                <td><input type="text" name="licence_plate" value="{{ old('licence_plate') }}"></td>
                <div class="invalid-feedback">@error('licence_plate') {{$message}} @enderror</div>
            </tr>
            <tr>
                <th>Year</th>
                <td><input type="text" name="year" value="{{ old('year') }}"></td>
                <div class="invalid-feedback">@error('year') {{$message}} @enderror</div>
            </tr>
            <tr>
                <th>Date Buy</th>
                <td><input type="date" name="date_buy" value="{{ old('date_buy') }}"></td>
                <div class="invalid-feedback">@error('date_buy') {{$message}} @enderror</div>
            </tr>
        </table>
        <button type="submit" class="btn btn-primary">Criar Veículo</button>
    </form>
</div>

</body>
</html>
