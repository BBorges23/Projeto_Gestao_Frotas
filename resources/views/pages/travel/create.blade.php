@extends('index')

@section('title','Criar viagem')
@section('content')

    <form class="form-custom" method="POST" action="{{ route('admin.travels.store') }}">
        @csrf
        <table>
            <tr>
                <th>Condutor</th>
                <td>
                    <select name="driver_id">
                        @foreach($drivers as $driver)
                            <option value="{{ $driver->id }}">{{ $driver->name }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <th>Veículo</th>
                <td>
                    <select name="vehicle_id">
                        @foreach($vehicles as $vehicle)
                            <option value="{{ $vehicle->id }}">{{ $vehicle->licence_plate }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

        </table>
        <button type="submit" class="btn btn-primary">Criar Viagem</button>
    </form>

@endsection
