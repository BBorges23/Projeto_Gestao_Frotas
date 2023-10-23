@extends('index')

@section('title','Editar Manutenção')
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

        <form class="form-custom" method="POST" action="{{ route('admin.maintenances.update', $maintenance->id) }}">
            @csrf
            @method('PUT')

            <table>
                <tr>
                    <th>Estado</th>
                    <td>
                        <select name="state">
                            <option value="PROCESSANDO">PROCESSANDO</option>
                            <option value="CANCELADO">CANCELADO</option>
                            <option value="CONCLUIDO">CONCLUIDO</option>
                        </select>

                        @if(request('state') === 'CANCELADO')
                            <input hidden="" type="text" name="is_traveling" value="0">
                        @elseif(request('state') === 'CONCLUIDO')
                            <input hidden="" type="text" name="is_traveling" value="0">
                        @else
                            <input hidden="" type="text" name="is_traveling" value="1">
                        @endif
                    </td>
                </tr>
                    <th>Veiculo</th>
                    <td>
                        <select name="vehicle_id">
                            @foreach($vehicles as $vehicle)
                                <option value="{{ $vehicle->id }}" {{$vehicle->licence_plate ? 'selected' : '' }}>
                                    {{ $vehicle->licence_plate }}
                                </option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Motivo</th>
                    <td><input type="text" name="coords_origem" value="{{ $maintenance->motive }}"></td>
                    <div class="invalid-feedback">@error('coords_origem') {{$message}} @enderror</div>
                </tr>
                <tr>
                    <th>Data de Entrada</th>
                    <td><input type="date" name="coords_destino" value="{{ $maintenance->date_entry }}"></td>
                    <div class="invalid-feedback">@error('coords_destino') {{$message}} @enderror</div>
                </tr>
                <tr>
                    <th>Data de Saída</th>
                    <td><input type="date" name="coords_destino" value="{{ $maintenance->date_exit }}"></td>
                    <div class="invalid-feedback">@error('coords_destino') {{$message}} @enderror</div>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Editar Manutenções</button><br>
            <a class="btn btn-secondary" href="{{ route('admin.maintenances.show',$maintenance->id) }}">Cancelar</a><br />
        </form>
    </div>
@endsection
