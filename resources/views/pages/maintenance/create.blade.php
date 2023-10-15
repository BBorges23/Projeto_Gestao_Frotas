@extends('index')

@section('title','Criar Manutenção')
@section('content')

    <form class="form-custom" method="POST" action="{{ route('admin.maintenances.store') }}">
        @csrf
        <table>
            <tr>
                <th>Veiculo</th>
                <td>
                    <select name="vehicle_id">
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->licence_plate }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Motivo</th>
                <td>
                    <input type="text" name="motive" value="{{ old('motive') }}">
                </td>
            </tr>
            <tr>
                <th>Data de entrada</th>
                <td>
                    <input type="date" name="date" value="{{ old('date') }}">
                </td>
            </tr>

        </table>
        <button type="submit" class="btn btn-primary">Criar Manutenção</button>
    </form>

@endsection
