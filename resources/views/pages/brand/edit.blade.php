@extends('index')
@section('title', 'Marcas')
@section('subtitle', ' -> Editar')

@section('content')
    <div>

{{--        @if($errors->any())--}}
{{--            --}}{{--Mensagem de erro do topo--}}
{{--            <div class="row p-2">--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    Verifique os dados inseridos--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form class="form-custom" method="POST" action="{{ route('admin.brands.update', ['brand' => $brand]) }}">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}

{{--            <label for="name">Nome da Marca:</label>--}}
{{--            <input type="text" id="name" name="name" value="{{ $brand->name }}" required>--}}
{{--            <div class="invalid-feedback">@error('name') {{$message}} @enderror</div>--}}

{{--            <button type="submit" class="btn btn-primary">Atualizar Marca</button>--}}
{{--            <a class="btn btn-secondary" href="{{ route('admin.brands.show',$brand->id) }}">Cancelar</a><br />--}}
{{--        </form>--}}
{{--    </div>--}}

    @component('components.edit_details', [
            'route_update' => 'admin.brands.update',
            'id' => $brand->id,
            'cor' => 'bg-info',
            'imagem'=> 'images/vehicle.png',
            'nome' => 'Editar Marca',
            'titulo1' => 'Nome da Marca',
            'tipo1' => 'text',
            'nome1' => 'name',
            'input1' => $brand->name,
            'route_show' => 'admin.brands.show',

            ])
    @endcomponent
@endsection
