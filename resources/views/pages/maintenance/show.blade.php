@extends('index')
@section('title', 'Manutenção')
@section('subtitle', ' -> Detalhes')
@section('content')

    <div class="container">
        <div class="driver-details">
            <table class="table">
                <tr>
                    <th>Estado</th>
                    <td>@if(!$maintenance->state)
                            Concluída
                        @else
                            Em Aberto
                        @endif
                    </td>
                </tr>
                <tr>
                    <th>Veiculo</th>
                    <td>{{ $maintenance->vehicle->licence_plate }}</td>
                </tr>
                <tr>
                    <th>Motivo</th>
                    <td>{{ $maintenance->motive }}</td>
                </tr>
                <tr>
                    <th>Data de Entrada</th>
                    <td>{{ $maintenance->date_entry }}</td>
                </tr>
                <tr>
                    <th>Data de Saída</th>
                    <td>{{ $maintenance->date_exit }}</td>
                </tr>
            </table>
        </div>
        @role('admin')
        <a class="btn btn-warning" href="{{ route('admin.maintenances.edit',$maintenance->id) }}">Editar</a><br />
        <form class="form-custom" method="POST"
              action="{{route('admin.maintenances.destroy',$maintenance->id)}}" style="display: inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Eliminar
            </button><br />
        </form>
        @endrole
        <a class="btn btn-primary" href="{{route(auth()->user()->getTypeUser().'.maintenances.index') }}">Voltar para a lista de manutenções</a>
    </div>
@endsection
