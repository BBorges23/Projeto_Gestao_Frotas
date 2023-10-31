@extends('index')
@section('title', 'Manutenções')
@section('subtitle', ' -> Criar')
@section('content')

{{--        <div>--}}

{{--            @if($errors->any())--}}
{{--                Mensagem de erro do topo--}}
{{--            <div class="row p-2">--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    Verifique os dados inseridos--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}
{{--        <form class="form-custom" method="POST" action="{{ route('admin.maintenances.store') }}">--}}
{{--            @csrf--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <th>Veiculo</th>--}}
{{--                    <td>--}}
{{--                        <select name="vehicle_id">--}}
{{--                            @foreach($vehicles as $vehicle)--}}
{{--                                <option value="{{ $vehicle->id }}">{{ $vehicle->licence_plate }}</option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Motivo</th>--}}
{{--                    <td>--}}
{{--                        <input type="text" name="motive" value="{{ old('motive') }}">--}}
{{--                        <div class="invalid-feedback">@error('motive') {{$message}}  @enderror</div>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Data de entrada</th>--}}
{{--                    <td>--}}
{{--                        <input type="date" name="date_entry" value="{{ old('date_entry') }}">--}}
{{--                        <div class="invalid-feedback">@error('date_entry') {{$message}}  @enderror</div>--}}
{{--                    </td>--}}
{{--                </tr>--}}

{{--            </table>--}}
{{--            <button type="submit" class="btn btn-primary">Criar Manutenção</button>--}}
{{--        </form>--}}
{{--    </div>--}}

@foreach($vehicles as $vehicle) @endforeach

@component('components.create_form', [
    'route_create' => 'admin.maintenances.store',
    'imagem' => 'images/maintenance.png',
    'cor' => 'btn-secondary',
    'nome' => 'Criar Manutenção',
    'titulo1' => 'Data de Entrada',
    'tipo1' => 'date',
    'input_nome1' => 'date_entry',
    'titulo2' => 'Motivo',
    'tipo2' => 'text',
    'input_nome2' => 'motive',
    'titulo7' => 'Veiculo',
    'select7' => 'vehicle_id',
    'array7' => $vehicles,
    'option7' => $vehicle,
    'cancelar' => auth()->user()->getTypeUser().'.maintenances.index'

])
@endcomponent

@endsection
