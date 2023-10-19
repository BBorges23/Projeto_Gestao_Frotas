@extends('index')
@section('title','Criar Nova Marca')

@section('content')
    <div>

        @if($errors->any())
            {{--Mensagem de erro do topo--}}
            <div class="row p-2">
                <div class="alert alert-danger" role="alert">
                    Verifique os dados inseridos
                </div>
            </div>
        @endif

        <form class="form-custom" method="POST" action="{{ route('admin.brands.store') }}">
            @csrf

            <label for="name">Nome da Marca:</label>
            <input type="text" id="name" name="name" required>
            <div class="invalid-feedback">@error('name') {{$message}} @enderror</div>

            <button type="submit" class="btn btn-primary">Criar Marca</button>
        </form>
    </div>
@endsection
