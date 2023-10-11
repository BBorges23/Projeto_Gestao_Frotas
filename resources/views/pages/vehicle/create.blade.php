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
