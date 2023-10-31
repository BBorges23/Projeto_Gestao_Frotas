@extends('index')
@section('title', 'Veículos')
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

{{--        <form class="form-custom" method="POST" action="{{ route('admin.vehicles.update', $vehicle->id) }}">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}

{{--            <table>--}}
{{--                <tr>--}}
{{--                    <th>Modelo ID</th>--}}
{{--                    <td>--}}
{{--                        <select name="carmodel_id">--}}
{{--                            @foreach($carmodels as $model)--}}
{{--                                <option value="{{ $model->id }}" {{$vehicle->model->id == $model->id ? 'selected' : '' }}>--}}
{{--                                    {{ $model->name }}--}}
{{--                                </option>--}}
{{--                            @endforeach--}}
{{--                        </select>--}}
{{--                    </td>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Licence Plate</th>--}}
{{--                    <td><input type="text" name="licence_plate" value="{{ $vehicle->licence_plate }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('licence_plate') {{$message}}  @enderror</div>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Year</th>--}}
{{--                    <td><input type="text" name="year" value="{{ $vehicle->year }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('year') {{$message}}@enderror</div>--}}
{{--                </tr>--}}
{{--                <tr>--}}
{{--                    <th>Date Buy</th>--}}
{{--                    <td><input type="date" name="date_buy" value="{{ $vehicle->date_buy }}"></td>--}}
{{--                    <div class="invalid-feedback">@error('date_buy') {{$message}}@enderror</div>--}}
{{--                </tr>--}}
{{--            </table><br />--}}
{{--            <button type="submit" class="btn btn-primary">Editar Veículo</button><br />--}}
{{--            <a class="btn btn-secondary" href="{{ route('admin.vehicles.show',$vehicle->id) }}">Cancelar</a><br />--}}
{{--        </form>--}}
{{--    </div>--}}

@foreach($carmodels as $model) @endforeach

@component('components.edit_details', [
        'route_update' => 'admin.vehicles.update',
        'id' => $vehicle->id,
        'cor' => 'bg-info',
        'imagem'=> 'images/vehicle.png',
        'nome' => 'Editar Veículo',
        'titulo1' => 'Matricula',
        'tipo1' => 'text',
        'nome1' => 'licence_plate',
        'input1' => $vehicle->licence_plate,
        'disabled1' => '',
        'titulo2' => 'Ano',
        'tipo2' => 'text',
        'nome2' => 'year',
        'input2' => $vehicle->year,
        'titulo3' => 'Modelo',
        'select1' => 'carmodel_id',
        'array1' => $carmodels,
        'option1' => $model,
        'selected1' => $vehicle->model->id,
        'cancelar' => 'admin.vehicles.index',
        'titulo6' => 'Data de compra',
        'tipo3' => 'date',
        'nome3' => 'date_buy',
        'input3' => $vehicle->date_buy,
        'disabled2' => '',
        'route_show' => 'admin.vehicles.show',
        ])
@endcomponent

@endsection
