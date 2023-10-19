@extends('index')

@section('title','Criar viagem')
@section('content')

    <div>
        @if($errors->any())
            {{--Mensagem de erro do topo--}}
            <div class="row p-2">
                <div class="alert alert-danger" role="alert">
                    Verifique os dados inseridos
                </div>
            </div>
        @endif

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
                <tr>
                    <th>Coordenadas de Origem</th>
                    <td><input type="text" name="coords_origem" value="{{ old('coords_origem') }}"></td>
                    <div class="invalid-feedback">@error('coords_origem') {{$message}} @enderror</div>
                </tr>
                <tr>
                    <th>Coordenadas de Destino</th>
                    <td><input type="text" name="coords_destino" value="{{ old('coords_destino') }}"></td>
                    <div class="invalid-feedback">@error('coords_destino') {{$message}} @enderror</div>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Criar Viagem</button>
        </form>
    </div>

@endsection
