@extends('index')
@section('title', 'Manutenções')
@section('subtitle', ' -> Criar')
@section('content')


@foreach($vehicles as $vehicle) @endforeach

@component('components.create_form', [
    'route_create' => auth()->user()->getTypeUser().'.maintenances.store',
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
