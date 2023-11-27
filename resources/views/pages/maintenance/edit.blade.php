@extends('index')
@section('title','Manutenções')
@section('subtitle', ' -> Editar')

@section('content')


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
