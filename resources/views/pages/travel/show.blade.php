@extends('index')
@section('title','Viagens')

@section('content')
    <label>id</label>
    {{$travel->id}}
    <label>Nome Motorista</label>
    {{ $driver->name }}
    <label>Matricula</label>
    {{ $vehicle->licence_plate }}
@endsection
