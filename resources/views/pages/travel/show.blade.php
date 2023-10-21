@extends('index')
@section('title','Viagens')

@section('content')
    <label>id</label>
    {{$travel->id}}
    <label>Nome Motorista</label>
    {{ $driver->name }}
    <label>Matricula</label>
    {{ $vehicle->licence_plate }}


    <form class="form-custom" method="POST"
          action="{{route('admin.travels.destroy',$travel->id)}}" style="display: inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar
        </button><br />
    </form>
@endsection
