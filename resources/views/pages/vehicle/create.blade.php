@extends('index')
@section('title', 'Veículos')
@section('subtitle', ' -> Criar')
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

        <form class="form-custom" method="POST" action="{{ route('admin.vehicles.store') }}">
            @csrf
            <table>
                <tr>
                    <th>Modelo:</th>
                    <td>
                        <select name="carmodel_id">
                            @foreach($carmodels as $model)
                                <option value="{{ $model->id }}">{{ $model->name }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Matricula:</th>
                    <td><input type="text" name="licence_plate" value="{{ old('licence_plate') }}"></td>
                    <div class="invalid-feedback">@error('licence_plate') {{$message}} @enderror</div>
                </tr>
                <tr>
                    <th>Ano:</th>
                    <td><input type="text" name="year" value="{{ old('year') }}"></td>
                    <div class="invalid-feedback">@error('year') {{$message}} @enderror</div>
                </tr>
                <tr>
                    <th>Data de Compra:</th>
                    <td><input type="date" name="date_buy" value="{{ old('date_buy') }}"></td>
                    <div class="invalid-feedback">@error('date_buy') {{$message}} @enderror</div>
                </tr>
            </table>
            <button type="submit" class="btn btn-primary">Criar Veículo</button>
        </form>
    </div>
@endsection
