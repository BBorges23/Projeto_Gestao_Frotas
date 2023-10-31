@extends('index')
@section('title','Modelos')
@section('subtitle', ' -> Criar')

@section('content')
{{--    <div>--}}

{{--        @if($errors->any())--}}
{{--            --}}{{--Mensagem de erro do topo--}}
{{--            <div class="row p-2">--}}
{{--                <div class="alert alert-danger" role="alert">--}}
{{--                    Verifique os dados inseridos--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        @endif--}}

{{--        <form class="form-custom" method="POST" action="{{ route('admin.carmodels.store') }}">--}}
{{--            @csrf--}}

{{--            <label for="name">Nome do Modelo:</label>--}}
{{--            <input type="text" id="name" name="name" required>--}}
{{--            <div class="invalid-feedback">@error('name') {{$message}} @enderror</div>--}}

{{--            <label for="brand_id">Selecione a Marca:</label>--}}
{{--            <select id="brand_id" name="brand_id" required>--}}
{{--                @foreach($brands as $brand)--}}
{{--                    <option value="{{ $brand->id }}">{{ $brand->name }}</option>--}}
{{--                @endforeach--}}
{{--            </select>--}}
{{--            <div class="invalid-feedback">@error('brand_id') {{$message}} @enderror</div>--}}

{{--            <button type="submit" class="btn btn-primary">Criar Modelo</button>--}}
{{--        </form>--}}
{{--    </div>--}}
@foreach($brands as $brand) @endforeach
@component('components.create_form', [
    'route_create' => 'admin.carmodels.store',
    'cor' => 'bg-info',
    'imagem' => 'images/vehicle.png',
    'nome' => 'Criar Modelo',
    'titulo1' => 'Nome do Modelo',
    'tipo1' => 'text',
    'input_nome1' => 'name',
    'titulo3' => 'Marca',
    'select3' => 'brand_id',
    'array3' => $brands,
    'option3' => $brand,
    'cancelar' => 'admin.carmodels.index'
    ])
    @endcomponent

@endsection
