@extends('index')
@section('title', 'Manutenções')
@section('subtitle', ' -> Detalhes')
@section('content')

    @component('components.show_details', [
    'cor' => 'bg-secondary',
    'imagem' => 'images/maintenance.png',
    'nome' => 'Estado',
    'descricao' => $maintenance->state,
    'titulo1' => 'Veiculo',
    'informacao1' => $maintenance->vehicle->licence_plate,
    'titulo2' => 'Motivo',
    'informacao2' => $maintenance->motive,
    'titulo3' => 'Data de Entrada',
    'informacao3' => $maintenance->date_entry,
    'titulo4' => 'Data de Saida',
    'informacao4' => $maintenance->date_exit,
    'id' => $maintenance->id,
    'route1' => auth()->user()->getTypeUser().'.maintenances.index',
    'route2' => $maintenance->state == 'PROCESSANDO' ? 'admin.maintenances.edit' : null,
    'route3' => $maintenance->state == 'PROCESSANDO' ? 'admin.maintenances.edit' : null,
    'status_driver' => $maintenance->comments ?: "N/A",
    'maintenance_state'=> $maintenance->state,
    'route4' => 'driver.home.index',
    ])
    @endcomponent

@endsection
