@extends('index')
@section('title', 'Manutenções')
@section('subtitle', ' -> Detalhes')
@section('content')

    @component('components.show_details', [
    'cor' => 'bg-secondary',
    'imagem' => 'images/maintenance.png',
    'nome' => 'Estado',
    'descricao' => !$maintenance->state ? 'Concluída' : 'Em Aberto',
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
    'route2' => 'admin.maintenances.edit',
    'route3' => 'admin.maintenances.destroy'
    ])
    @endcomponent

@endsection
