@extends('index')
@section('title', 'Veículos')
@section('subtitle', ' -> Criar')
@section('content')


    {{-- TEMOS QUE REVER A MANEIRA DE PASSAR A INFO DE $MODEL--}}
    @foreach($carmodels as $model)
    @endforeach


    {{--        @if($errors->any())--}}
    {{--            --}}{{--Mensagem de erro do topo--}}
    {{--            <div class="row p-2">--}}
    {{--                <div class="alert alert-danger" role="alert">--}}
    {{--                    Verifique os dados inseridos--}}
    {{--                </div>--}}
    {{--            </div>--}}
    {{--        @endif--}}

    {{--        <form class="form-custom" method="POST" action="{{ route('admin.vehicles.store') }}">--}}
    {{--            --}}
    {{--            <table>--}}
    {{--                <tr>--}}
    {{--                    <th>Modelo:</th>--}}
    {{--                    <td>--}}
    {{--                        <select name="carmodel_id">--}}
    {{--                            @foreach($carmodels as $model)--}}
    {{--                                <option value="{{ $model->id }}">{{ $model->name }}</option>--}}
    {{--                            @endforeach--}}
    {{--                        </select>--}}
    {{--                    </td>--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <th>Matricula:</th>--}}
    {{--                    <td><input type="text" name="licence_plate" value="{{ old('licence_plate') }}"></td>--}}
    {{--                    <div class="invalid-feedback">@error('licence_plate') {{$message}} @enderror</div>--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <th>Ano:</th>--}}
    {{--                    <td><input type="text" name="year" value="{{ old('year') }}"></td>--}}
    {{--                    <div class="invalid-feedback">@error('year') {{$message}} @enderror</div>--}}
    {{--                </tr>--}}
    {{--                <tr>--}}
    {{--                    <th>Data de Compra:</th>--}}
    {{--                    <td><input type="date" name="date_buy" value="{{ old('date_buy') }}"></td>--}}
    {{--                    <div class="invalid-feedback">@error('date_buy') {{$message}} @enderror</div>--}}
    {{--                </tr>--}}
    {{--            </table>--}}
    {{--            <button type="submit" class="btn btn-primary">Criar Veículo</button>--}}
    {{--        </form>--}}
    {{--    </div>--}}
    @component('components.create_form', [
    'route_create' => 'admin.vehicles.store',
    'cor' => 'bg-info',
    'imagem' => 'images/vehicle.png',
    'nome' => 'Criar Veículo',
    'titulo1' => 'Matricula',
    'input_nome1' => 'licence_plate',
    'titulo2' => 'Ano',
    'input_nome2' => 'year',
    'titulo3' => 'Modelo',
    'select1' => 'carmodel_id',
    'array1' => $carmodels,
    'model' => $model,
    'cancelar' => 'admin.vehicles.index',
    'titulo4' => 'Data de compra',
    'tipo' => 'date',
    'input_nome3' => 'date_buy'
])
    @endcomponent

@endsection

