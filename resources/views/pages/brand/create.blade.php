@extends('index')
@section('title','Criar Nova Marca')

@section('content')
    <div>
        <form class="form-custom" method="POST" action="{{ route('admin.brands.store') }}">
            @csrf

            <label for="name">Nome da Marca:</label>
            <input type="text" id="name" name="name" required>

            <button type="submit" class="btn btn-primary">Criar Marca</button>
        </form>
    </div>
@endsection
