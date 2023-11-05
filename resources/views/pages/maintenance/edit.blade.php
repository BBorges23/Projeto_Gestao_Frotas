@extends('index')
@section('title','Manutenções')
@section('subtitle', ' -> Editar')

@section('content')
{{--    <div>--}}

{{--        <form class="form-custom" method="POST" action="{{ route('admin.maintenances.update', $maintenance->id) }}">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}

{{--            <table>--}}
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
{{--                    <th>Veiculo</th>--}}
{{--                    <td>--}}
{{--                        <select name="vehicle_id">--}}
{{--                            @foreach($vehicles as $vehicle)--}}
{{--                                <option value="{{ $vehicle->id }}" {{$vehicle->licence_plate ? 'selected' : '' }}>--}}
{{--                                    {{ $vehicle->licence_plate }}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Motivo</th>--}}
{{--                    <td><input type="text" name="coords_origem" value="{{ $maintenance->motive }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('coords_origem') {{$message}} @enderror</div>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Data de Entrada</th>--}}
{{--                    <td><input type="date" name="coords_destino" value="{{ $maintenance->date_entry }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('coords_destino') {{$message}} @enderror</div>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Data de Saída</th>--}}
{{--                    <td><input type="date" name="coords_destino" value="{{ $maintenance->date_exit }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('coords_destino') {{$message}} @enderror</div>--}}
{{--                </tr>--}}
{{--            </table>--}}
{{--            <button type="submit" class="btn btn-primary">Editar Manutenções</button><br>--}}
{{--            <a class="btn btn-secondary" href="{{ route('admin.maintenances.show',$maintenance->id) }}">Cancelar</a><br />--}}
{{--        </form>--}}
{{--    </div>--}}

@foreach($vehicles as $vehicle) @endforeach

@component('components.edit_details', [
        'route_update' => 'admin.maintenances.update',
        'id' => $maintenance->id,
        'imagem' => 'images/maintenance.png',
        'cor' => 'btn-secondary',
        'nome' => 'Editar Manutenção',
        'titulo1' => 'Data de Entrada',
        'nome1' => 'date_entry',
        'tipo1' => 'date',
        'input1' => $maintenance->date_entry,
        'disabled1' => '',
        'titulo2' => 'Data de Saída',
        'nome2' => 'date_exit',
        'tipo2' => 'date',
        'input2' => $maintenance->date_exit,
        'titulo4' => 'Veiculo',
        'select2' => 'vehicle_id',
        'array2' => $vehicles,
        'option2' => $vehicle,
        'selected2' => $maintenance->vehicle->id,
        'titulo6' => 'Motivo',
        'tipo3' => 'text',
        'nome3' => 'motive',
        'input3' => $maintenance->motive,
        'disabled2' => '',
        'titulo8' => 'Estado',
        'selected4' => $maintenance->state,
        'route_show' => 'admin.maintenances.index'

    ])
    @endcomponent

@endsection
