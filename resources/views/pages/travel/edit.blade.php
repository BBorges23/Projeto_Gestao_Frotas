@extends('index')

@section('title','Editar Viagens')
@section('content')
    <div>

        <form class="form-custom" method="POST" action="{{ route('admin.travels.update', $travel->id) }}">
            @csrf
            @method('PUT')

            <table>
                <tr>
                    <th>Condutor</th>
                    <td>
                        <select name="driver_id">
                            @foreach($drivers as $driver)
                                <option value="{{ $driver->id }}" {{$travel->driver_id == $driver->id ? 'selected' : ''}}>
                                    {{ $driver->name }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>VeÃ­culo</th>
                    <td>
                        <select name="vehicle_id">
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" {{$travel->vehicle_id == $vehicle->id ? 'selected' : '' }}>
                                    {{ $vehicle->licence_plate }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>

            </table>
            <button type="submit" class="btn btn-primary">Editar Viagem</button>
        </form>
    </div>
@endsection
