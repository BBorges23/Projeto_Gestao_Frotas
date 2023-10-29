@extends('index')
@section('title', 'Modelos')
@section('subtitle', ' -> Detalhes')

@section('content')

    @component('components.show_details', [
    'cor' => 'bg-info',
    'imagem' => 'images/vehicle.png',
    'titulo1' => 'Modelo ID',
    'informacao1' => $carmodel->id,
    'titulo2' => 'Nome Modelo',
    'informacao2' => $carmodel->name,
    'titulo3' => 'Nome de Marca',
    'informacao3' => $carmodel->brand->name,
    'id' => $carmodel->id,
    'route1' => 'admin.carmodels.index',
    'route2' => 'admin.carmodels.edit',
    'route3' => 'admin.carmodels.destroy'
    ])

    @endcomponent

    <div class="container">
        <div class="vehicle-details">
            <table class="table">
                <tr>
                    <th>Model ID</th>
                    <td>{{ $carmodel->id }}</td>
                </tr>
                <tr>
                    <th>Modelo Name</th>
                    <td>{{ $carmodel->name }}</td>
                </tr>
                <tr>
                    <th>Marca name</th>
                    <td>{{ $carmodel->brand->name }}</td>
                </tr>
            </table>
        </div>
        @role('admin')
        <a class="btn btn-warning" href="{{ route('admin.carmodels.edit',$carmodel->id) }}">Editar</a><br />
        <form class="form-custom" method="POST"
              action="{{route('admin.carmodels.destroy',$carmodel->id)}}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar
            </button><br />
        </form>
        <a class="btn btn-primary" href="{{ route('admin.carmodels.index') }}">Voltar para a lista de Modelos</a>
        @endrole
    </div>
@endsection

