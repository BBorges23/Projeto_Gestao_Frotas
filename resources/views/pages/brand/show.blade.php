@extends('index')
@section('title', 'Marcas')
@section('subtitle', ' -> Detalhes')

@section('content')
    <div class="container">
        <div class="vehicle-details">
            <table class="table">
                <tr>
                    <th>Brand ID</th>
                    <td>{{ $brand->id }}</td>
                </tr>
                <tr>
                    <th>Brand Name</th>
                    <td>{{ $brand->name }}</td>
                </tr>
            </table>
        </div>
        @role('admin')
        <a class="btn btn-warning" href="{{ route('admin.brands.edit',$brand->id) }}">Editar</a><br />
        <form class="form-custom" method="POST"
              action="{{route('admin.brands.destroy',$brand->id)}}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar
            </button><br />
        </form>
        <a class="btn btn-primary" href="{{ route('admin.brands.index') }}">Voltar para a lista de Marcas</a>
        @endrole
    </div>
@endsection
