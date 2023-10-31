@extends('index')
@section('title', 'Modelos')
@section('subtitle', ' -> Editar')

@section('content')
{{--    <div>--}}

{{--        <form method="POST" action="{{route('admin.carmodels.update', ['carmodel' => $carmodel->id]) }}">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}

{{--            <div>--}}
{{--                <label for="name">Nome do Modelo:</label>--}}
{{--                <input type="text" name="name" id="name" value="{{ $carmodel->name }}">--}}
{{--                <div class="invalid-feedback">@error('name') {{$message}}  @enderror</div>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <label for="brand_id">Marca:</label>--}}
{{--                <select name="brand_id" id="brand_id">--}}
{{--                    @foreach($brands as $brand)--}}
{{--                        <option value="{{ $brand->id }}" {{ $brand->id === $carmodel->brand_id ? 'selected' : '' }}>{{ $brand->name }}</option>--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--                <div class="invalid-feedback">@error('brand_id') {{$message}} @enderror</div>--}}
{{--            </div>--}}
{{--            <div>--}}
{{--                <button type="submit" class="btn btn-primary">Atualizar Modelo</button>--}}
{{--                <a class="btn btn-secondary" href="{{ route('admin.carmodels.show',$carmodel->id) }}">Cancelar</a><br />--}}
{{--            </div>--}}
{{--        </form>--}}

{{--    </div>--}}
@foreach($brands as $brand) @endforeach

    @component('components.edit_details', [
        'route_update' => 'admin.carmodels.update',
        'id' => $carmodel->id,
        'cor' => 'bg-info',
        'imagem'=> 'images/vehicle.png',
        'nome' => 'Editar Modelo',
        'titulo1' => 'Nome do Modelo',
        'tipo1' => 'text',
        'nome1' => 'name',
        'input1' => $carmodel->name,
        'disabled1' => '',
        'route_show' => 'admin.carmodels.show',
        'titulo3' => 'Marca',
        'select1' => 'brand_id',
        'array1' => $brands,
        'option1' => $brand,
        'selected1' => $carmodel->brand->id
        ])
    @endcomponent
@endsection
