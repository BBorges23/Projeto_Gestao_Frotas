@extends('index')
@section('title', 'Viagens')
@section('subtitle', ' -> Criar')
@section('content')


{{--    <div>--}}
{{--        @if($errors->any())--}}
{{--            --}}{{--Mensagem de erro do topo--}}
{{--            <div class="row p-2">--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    Verifique os dados inseridos--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form class="form-custom" method="POST" action="{{ route('admin.travels.store') }}">--}}
{{--            @csrf--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <th>Condutor</th>--}}
{{--                    <td>--}}
{{--                        <select name="driver_id">--}}
{{--                            @foreach($drivers as $driver)--}}
{{--                                <option value="{{ $driver->id }}">{{ $driver->user->name }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Veículo</th>--}}
{{--                    <td>--}}
{{--                        <select name="vehicle_id">--}}
{{--                            @foreach($vehicles as $vehicle)--}}
{{--                                <option value="{{ $vehicle->id }}">{{ $vehicle->licence_plate }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Coordenadas de Origem</th>--}}
{{--                    <td><input type="text" name="coords_origem" value="{{ old('coords_origem') }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('coords_origem') {{$message}} @enderror</div>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Coordenadas de Destino</th>--}}
{{--                    <td><input type="text" name="coords_destino" value="{{ old('coords_destino') }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('coords_destino') {{$message}} @enderror</div>--}}
{{--                </tr>--}}
{{--            </table>--}}
{{--            <button type="submit" class="btn btn-primary">Criar Viagem</button>--}}
{{--        </form>--}}
{{--    </div>--}}

    @foreach($vehicles as $vehicle)
    @endforeach

    @foreach($drivers as $driver)
    @endforeach
        @component('components.create_form', [
        'route_create' => auth()->user()->getTypeUser().'.travels.store',
        'imagem' => 'images/mapa.png',
        'cor' => 'btn-warning',
        'nome' => 'Criar Viagem',
        'titulo1' => 'Coordenadas de Origem',
        'tipo1' => 'text',
        'input_nome1' => 'coords_origem',
        'titulo2' => 'Coordenadas de Destino',
        'tipo2' => 'text',
        'input_nome2' => 'coords_destino',
        'titulo6' => 'Condutor',
        'select6' => 'driver_id',
        'array6' => $drivers,
        'option6' => $driver,
        'titulo7' => 'Veiculo',
        'select7' => 'vehicle_id',
        'array7' => $vehicles,
        'option7' => $vehicle,
        'cancelar' => auth()->user()->getTypeUser().'.travels.index'
       ])
        @endcomponent

@endsection

