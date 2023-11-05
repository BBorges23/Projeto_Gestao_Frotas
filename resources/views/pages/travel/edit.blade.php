@extends('index')
@section('title','Viagens')
@section('subtitle', ' -> Editar')
@section('content')
{{--    <div>--}}

{{--        @if($errors->any())--}}
{{--            Mensagem de erro do topo--}}
{{--            <div class="row p-2">--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    Verifique os dados inseridos--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form class="form-custom" method="POST" action="{{ route('admin.travels.update', $travel->id) }}">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}

{{--            <table>--}}
{{--                <tr>--}}
{{--                    <th>Condutor</th>--}}
{{--                    <td>--}}
{{--                        <select name="driver_id">--}}
{{--                            @foreach($drivers as $driver)--}}
{{--                                <option value="{{ $driver->id }}" {{$travel->driver_id == $driver->id ? 'selected' : ''}}>--}}
{{--                                    {{ $driver->user->name }}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Veiculo</th>--}}
{{--                    <td>--}}
{{--                        <select name="vehicle_id">--}}
{{--                            @foreach($vehicles as $vehicle)--}}
{{--                                <option value="{{ $vehicle->id }}" {{$travel->vehicle_id == $vehicle->id ? 'selected' : '' }}>--}}
{{--                                    {{ $vehicle->licence_plate }}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Coordenadas de Origem</th>--}}
{{--                    <td><input type="text" name="coords_origem" value="{{ $travel->coords_origem }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('coords_origem') {{$message}} @enderror</div>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Coordenadas de Destino</th>--}}
{{--                    <td><input type="text" name="coords_destino" value="{{ $travel->coords_destino }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('coords_destino') {{$message}} @enderror</div>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Estado</th>--}}
{{--                    <td>--}}
{{--                        <select name="state">--}}
{{--                            <option value="PROCESSANDO">PROCESSANDO</option>--}}
{{--                            <option value="CANCELADO">CANCELADO</option>--}}
{{--                            <option value="CONCLUIDO">CONCLUIDO</option>--}}
{{--                        </select>--}}

{{--                        @if(request('state') === 'CANCELADO')--}}
{{--                            <input hidden="" type="text" name="is_traveling" value="0">--}}
{{--                        @elseif(request('state') === 'CONCLUIDO')--}}
{{--                            <input hidden="" type="text" name="is_traveling" value="0">--}}
{{--                        @else--}}
{{--                            <input hidden="" type="text" name="is_traveling" value="1">--}}
{{--                        @endif--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--            </table>--}}
{{--            <button type="submit" class="btn btn-primary">Editar Viagem</button><br>--}}
{{--            <a class="btn btn-secondary" href="{{ route('admin.travels.show',$travel->id) }}">Cancelar</a><br />--}}
{{--        </form>--}}
{{--    </div>--}}

@foreach($vehicles as $vehicle) @endforeach

@foreach($drivers as $driver) @endforeach

@component('components.edit_details', [
        'route_update' => 'admin.travels.update',
        'id' => $travel->id,
        'imagem' => 'images/mapa.png',
        'cor' => 'btn-warning',
        'nome' => 'Editar Viagem',
        'titulo1' => 'Coordenadas de Origem',
        'nome1' => 'coords_origem',
        'tipo1' => 'text',
        'input1' => $travel->coords_origem,
        'disabled1' => '',
        'titulo2' => 'Coordenadas de Destino',
        'nome2' => 'coords_destino',
        'tipo2' => 'text',
        'input2' => $travel->coords_destino,
        'titulo4' => 'Veiculo',
        'select2' => 'vehicle_id',
        'array2' => $vehicles,
        'option2' => $vehicle,
        'selected2' => $travel->vehicle->id,
        'titulo5' => 'Motorista',
        'select3' => 'driver_id',
        'array3' => $drivers,
        'option3' => $driver,
        'selected3' => $travel->driver->id,
        'titulo8' => 'Estado',
        'selected4' => $travel->state,
        'route_show' => 'admin.travels.index'

    ])
@endcomponent
@endsection
